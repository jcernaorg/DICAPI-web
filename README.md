# 🚢 DICAPI - Sistema de Gestión de Publicaciones y Plantillas

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/Database-MySQL-informational?style=flat-square&logo=mysql)
![Recaptcha](https://img.shields.io/badge/Recaptcha-v2-important?style=flat-square&logo=google)

---

## 📑 Índice

1. [Descripción General](#descripción-general)
2. [Características Principales](#características-principales)
3. [Requisitos](#requisitos)
4. [Instalación Paso a Paso](#instalación-paso-a-paso)
5. [Configuración Inicial](#configuración-inicial)
6. [Estructura del Proyecto](#estructura-del-proyecto)
7. [Uso del Sistema](#uso-del-sistema)
8. [Seguridad](#seguridad)
9. [Testing](#testing)
10. [Solución de Problemas](#solución-de-problemas)
11. [Créditos y Licencia](#créditos-y-licencia)

---

## 1. 📖 Descripción General

DICAPI es una plataforma web desarrollada en Laravel para la gestión de publicaciones y plantillas, orientada a la administración de contenidos digitales, con un panel de administración seguro y moderno. Incluye autenticación robusta, control de intentos de acceso, integración con Google reCAPTCHA v2 y un diseño responsivo.

---

## 2. ✨ Características Principales

- 🛡️ **Login seguro** con control de intentos y captcha
- 📚 **Gestión de publicaciones** (CRUD)
- 📝 **Gestión de plantillas** (CRUD)
- 👤 **Panel de administración** con dashboard
- 📦 **Sistema de seeders** para datos de prueba
- 🔒 **Middleware de seguridad** y validaciones
- 🌐 **Frontend responsivo** y atractivo
- 🗂️ **Estructura modular y escalable**

---

## 3. ⚙️ Requisitos

- PHP >= 8.2.0
- Composer
- MySQL o SQLite
- Node.js y npm (para assets frontend)
- Claves de Google reCAPTCHA v2

---

## 4. 🚀 Instalación Paso a Paso

### 4.1. Clonar el repositorio
```bash
git clone https://github.com/tuusuario/dicapi.git
cd dicapi/laravel-app
```

### 4.2. Instalar dependencias backend
```bash
composer install
```

### 4.3. Instalar dependencias frontend
```bash
npm install
```

### 4.4. Copiar y configurar variables de entorno
```bash
cp .env.example .env
```
Edita el archivo `.env` y configura:
- Base de datos
- Claves de reCAPTCHA

### 4.5. Generar clave de aplicación
```bash
php artisan key:generate
```

### 4.6. Ejecutar migraciones y seeders
```bash
php artisan migrate --seed
```

### 4.7. Compilar assets frontend
```bash
npm run build
```

### 4.8. Iniciar el servidor
```bash
php artisan serve
```

---

## 5. 🛠️ Configuración Inicial

- **Usuario administrador por defecto:**
  - Email: `admin@dicapi.com`
  - Contraseña: `admin123`
- **Configura tus claves de reCAPTCHA** en el archivo `.env`:
  ```env
  RECAPTCHA_SITE_KEY=tu_clave_sitio
  RECAPTCHA_SECRET_KEY=tu_clave_secreta
  ```
- **Base de datos:**
  - Puedes usar MySQL, MariaDB o SQLite (ajusta `.env` según tu entorno)

---

## 6. 🗂️ Estructura del Proyecto

```
laravel-app/
├── app/
│   ├── Console/Commands/         # Comandos artisan personalizados
│   ├── Http/Controllers/         # Controladores web
│   ├── Http/Middleware/          # Middlewares
│   ├── Models/                   # Modelos Eloquent
│   └── ...
├── config/                       # Configuración de servicios y app
├── database/
│   ├── migrations/               # Migraciones de base de datos
│   ├── seeders/                  # Seeders para datos de prueba
│   └── factories/                # Factories para tests
├── public/                       # Archivos públicos (index.php, imágenes, videos)
├── resources/
│   ├── views/                    # Vistas Blade
│   ├── css/                      # Estilos
│   └── js/                       # Scripts
├── routes/
│   └── web.php                   # Rutas web
├── storage/                      # Logs, caché, archivos temporales
├── tests/                        # Pruebas unitarias y funcionales
├── .env                          # Variables de entorno
├── composer.json                 # Dependencias PHP
├── package.json                  # Dependencias JS
└── README.md                     # Este archivo
```

---

## 7. 🧑‍💻 Uso del Sistema

### 7.1. Acceso al panel de administración
- Ingresa a `/admin-login`
- Usa el usuario administrador por defecto o crea uno nuevo

### 7.2. Gestión de publicaciones y plantillas
- Desde el dashboard puedes crear, editar, eliminar y ver publicaciones y plantillas
- Descarga archivos asociados desde el panel

### 7.3. Seguridad en el login
- Tienes 3 intentos antes de que se requiera captcha
- El captcha es obligatorio a partir del 4to intento fallido
- Los intentos se resetean al iniciar sesión correctamente

---

## 8. 🔒 Seguridad

- **Hash de contraseñas** con bcrypt
- **Protección CSRF** en formularios
- **Validación de datos** en backend y frontend
- **Control de intentos de login** y captcha
- **Middleware personalizado** para reCAPTCHA
- **Roles y autenticación** para rutas protegidas

---

## 9. 🧪 Testing

- Ejecuta pruebas unitarias y funcionales con:
```bash
php artisan test
```
- Usa seeders y factories para poblar la base de datos de pruebas
- Prueba el flujo de login, gestión de publicaciones y plantillas

---

## 10. 🛠️ Solución de Problemas

- **Error de credenciales:**
  - Verifica que el usuario exista en la base de datos
  - Revisa el hash de la contraseña
- **Captcha no funciona:**
  - Asegúrate de tener las claves correctas en `.env`
  - Verifica conexión a internet y dominio registrado en Google reCAPTCHA
- **Migraciones o seeders fallan:**
  - Verifica la configuración de la base de datos
  - Ejecuta `php artisan migrate:fresh --seed` para reiniciar
- **Problemas con assets:**
  - Ejecuta `npm run build` nuevamente
- **Logs y debugging:**
  - Revisa `storage/logs/laravel.log` para detalles de errores

---

## 11. 👥 Créditos y Licencia

- Desarrollado por: [Javier Cerna](https://github.com/jaacern)
- Basado en Laravel 12.x
- Licencia: MIT
- Iconos de [FontAwesome](https://fontawesome.com/) y [SimpleIcons](https://simpleicons.org/)

---

¡Gracias por usar DICAPI! Si tienes dudas o sugerencias, abre un issue o contacta al desarrollador.
