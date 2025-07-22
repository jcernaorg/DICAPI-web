# Configuración de reCAPTCHA para DICAPI

## Pasos para configurar reCAPTCHA v2

### 1. Obtener las claves de reCAPTCHA

1. Ve a [Google reCAPTCHA](https://www.google.com/recaptcha/admin)
2. Inicia sesión con tu cuenta de Google
3. Haz clic en "Crear" para registrar un nuevo sitio
4. Selecciona "reCAPTCHA v2" y "I'm not a robot" Checkbox
5. Agrega tu dominio (ej: `localhost` para desarrollo, `tudominio.com` para producción)
6. Acepta los términos y haz clic en "Enviar"
7. Copia las claves que te proporciona Google:
   - **Clave del sitio** (Site Key)
   - **Clave secreta** (Secret Key)

### 2. Configurar las variables de entorno

Agrega las siguientes líneas a tu archivo `.env`:

```env
RECAPTCHA_SITE_KEY=tu_clave_del_sitio_aqui
RECAPTCHA_SECRET_KEY=tu_clave_secreta_aqui
```

### 3. Funcionalidad implementada

El sistema ahora incluye:

- **3 intentos de login** antes de requerir captcha
- **Captcha requerido** después de 3 intentos fallidos
- **reCAPTCHA v2** que aparece después de 3 intentos fallidos
- **Advertencias** que informan al usuario sobre el estado de sus intentos
- **Reset automático** de intentos cuando el login es exitoso

### 4. Cómo funciona

1. **Primer intento fallido**: Mensaje de error normal
2. **Segundo intento fallido**: Advertencia de que se requerirá captcha en el próximo intento
3. **Tercer intento fallido**: Se requiere completar el captcha para el próximo intento
4. **Cuarto intento en adelante**: Captcha siempre requerido hasta login exitoso
5. **Login exitoso**: Se resetean todos los intentos fallidos

### 5. Notas importantes

- El sistema rastrea intentos por **email + dirección IP**
- **No hay bloqueo temporal** - solo se requiere captcha
- El captcha aparece después de 3 intentos fallidos
- Los intentos se resetean automáticamente al hacer login exitoso

### 6. Para desarrollo local

Si estás desarrollando localmente, puedes usar estas claves de prueba:

```env
RECAPTCHA_SITE_KEY=6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
RECAPTCHA_SECRET_KEY=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe
```

**Nota**: Estas claves de prueba solo funcionan en `localhost` y `127.0.0.1`. 