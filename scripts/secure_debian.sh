#!/usr/bin/env bash
# secure_debian.sh – Hardening + no-repudio
# Autor: jaacern  |  Fecha: 2025-07-11
set -euo pipefail

###############################################################################
# VARIABLES – AJUSTA SEGÚN TU ENTORNO
###############################################################################
SSH_ALLOWED_PORT=22               # Puerto SSH
REMOTE_LOG_HOST="logserver.tu-dominio.com"
REMOTE_LOG_PORT=6514              # TCP TLS
GPG_KEY_ID="YOUR_GPG_KEY_ID"      # gpg --list-keys
###############################################################################

[[ $EUID -eq 0 ]] || { echo "❌ Ejecútalo como root"; exit 1; }

echo "🔄  Actualizando el sistema…"
apt update -y && apt upgrade -y

echo "📦  Instalando paquetes de seguridad…"
apt install -y ufw fail2ban unattended-upgrades auditd audispd-plugins \
               rsyslog-gnutls gnupg lsb-release ca-certificates

###############################################################################
# 1. Cortafuegos UFW
###############################################################################
echo "🛡️  Configurando UFW…"
ufw default deny incoming
ufw default allow outgoing
ufw allow "${SSH_ALLOWED_PORT}/tcp" comment "SSH"
ufw limit "${SSH_ALLOWED_PORT}/tcp"
ufw --force enable

###############################################################################
# 2. Hardening SSH
###############################################################################
echo "🔐  Endureciendo SSH…"
SSHD_CFG=/etc/ssh/sshd_config.d/99-hardening.conf
cat > "$SSHD_CFG" <<EOF
# Hardening añadido por secure_debian.sh
Port $SSH_ALLOWED_PORT
Protocol 2
PermitRootLogin no
PasswordAuthentication no
KexAlgorithms curve25519-sha256@libssh.org
Ciphers chacha20-poly1305@openssh.com,aes256-gcm@openssh.com
MACs hmac-sha2-512-etm@openssh.com
EOF
systemctl restart sshd

###############################################################################
# 3. Fail2Ban (perfil básico SSH)
###############################################################################
echo "🚓  Configurando Fail2Ban…"
cat > /etc/fail2ban/jail.d/ssh-hardened.conf <<'EOF'
[sshd]
enabled  = true
port     = ssh
bantime  = 24h
findtime = 15m
maxretry = 5
EOF
systemctl enable --now fail2ban

###############################################################################
# 4. Unattended-upgrades
###############################################################################
echo "⚙️  Activando unattended-upgrades…"
sed -i 's#//Unattended-Upgrade::Automatic-Reboot.*#Unattended-Upgrade::Automatic-Reboot "true";#' \
       /etc/apt/apt.conf.d/50unattended-upgrades
systemctl enable --now unattended-upgrades

###############################################################################
# 5. Auditd + reglas de no-repudio
###############################################################################
echo "📝  Configurando auditd e inmutabilidad de logs…"
cp /usr/share/doc/auditd/examples/rules/10-base-config.rules /etc/audit/rules.d/
cat > /etc/audit/rules.d/60-local.rules <<'EOF'
# Cambios críticos en cuentas y grupos
-w /etc/passwd -p wa -k identity
-w /etc/shadow -p wa -k identity
-w /etc/group  -p wa -k identity
# Acceso a sudoers
-w /etc/sudoers -p wa -k priv_esc
# Archivos de logs del sistema
-w /var/log/auth.log -p wa -k logins
EOF
# Inmutabilidad al arrancar (-e 2)
echo "-e 2" > /etc/audit/rules.d/99-immutable.rules
augenrules --load
systemctl enable --now auditd

###############################################################################
# 6. Reenvío seguro de logs (rsyslog TLS)
###############################################################################
echo "📡  Enviando logs a ${REMOTE_LOG_HOST}:${REMOTE_LOG_PORT} vía TLS…"
cat >> /etc/rsyslog.d/90-remote-tls.conf <<EOF
\$DefaultNetstreamDriverCAFile /etc/ssl/certs/ca-certificates.crt
\$DefaultNetstreamDriver gtls
\$ActionSendStreamDriverMode 1   # run driver in TLS-only mode
\$ActionSendStreamDriverAuthMode anon
*.* @@${REMOTE_LOG_HOST}:${REMOTE_LOG_PORT};RSYSLOG_SyslogProtocol23Format
EOF
systemctl restart rsyslog

###############################################################################
# 7. Firma GPG diaria de logs rotados (cron.daily)
###############################################################################
echo "✍️  Añadiendo firma GPG diaria de /var/log/*.gz…"
SIGN_SCRIPT=/usr/local/sbin/sign-logs
cat > "$SIGN_SCRIPT" <<EOF
#!/usr/bin/env bash
LOGS=\$(find /var/log -name '*.gz' -type f -daystart -mtime 0)
for f in \$LOGS; do
  if [[ ! -f "\$f.sig" ]]; then
    gpg --quiet --yes --default-key ${GPG_KEY_ID} --detach-sign "\$f"
  fi
done
EOF
chmod +x "$SIGN_SCRIPT"
ln -sf "$SIGN_SCRIPT" /etc/cron.daily/sign-logs

###############################################################################
echo "✅ Hardening completado. Reinicia para aplicar al 100 %."
exit 0