# 🚢 DICAPI - Plataforma Web

[![Laravel](https://img.shields.io/badge/Laravel-12.19.3-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2.12-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.0-38B2AC.svg)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

> **La Dirección General de Capitanías y Guardacostas de la Marina de Guerra del Perú ejerce la Autoridad Marítima, Fluvial y Lacustre, es responsable de normar y velar por la seguridad de la vida humana, la protección del medio ambiente y sus recursos naturales así como reprimir todo acto ilícito; ejerciendo el control y vigilancia de todas las actividades que se realizan en el medio acuático, en cumplimiento de la ley y de los convenios internacionales, contribuyendo de esta manera al desarrollo nacional.**

## 📋 Índice

- [🎯 Descripción del Proyecto](#-descripción-del-proyecto)
- [🚀 Características Principales](#-características-principales)
- [🛠️ Tecnologías Utilizadas](#️-tecnologías-utilizadas)
- [📦 Requisitos del Sistema](#-requisitos-del-sistema)
- [⚙️ Instalación](#️-instalación)
- [🔧 Configuración](#-configuración)
- [🏃‍♂️ Ejecución](#️-ejecución)
- [📁 Estructura del Proyecto](#-estructura-del-proyecto)
- [🎨 Diseño y UI/UX](#-diseño-y-uiux)
- [📱 Páginas y Funcionalidades](#-páginas-y-funcionalidades)
- [🔐 Autenticación y Seguridad](#-autenticación-y-seguridad)
- [🗄️ Base de Datos](#️-base-de-datos)
- [🎭 Animaciones y Efectos](#-animaciones-y-efectos)
- [📊 Contadores y Estadísticas](#-contadores-y-estadísticas)
- [🔧 API y Controladores](#-api-y-controladores)
- [🧪 Testing](#-testing)
- [📈 Despliegue](#-despliegue)
- [🤝 Contribución](#-contribución)
- [📄 Licencia](#-licencia)
- [📞 Contacto](#-contacto)

## 🎯 Descripción del Proyecto

**DICAPI** es una plataforma web desarrollada en Laravel para la Dirección General de Capitanías y Guardacostas de la Marina de Guerra del Perú. Su objetivo es facilitar la gestión, información y servicios digitales relacionados con la Autoridad Marítima, Fluvial y Lacustre del país.

## 🚀 Características Principales

- 🌐 **Sitio Web Responsivo**
- 📄 **Información Institucional**
- 📱 **Interfaz moderna y accesible**
- 🛡️ **Seguridad y cumplimiento normativo**

## 🛠️ Tecnologías Utilizadas

- **Laravel 12.19.3**
- **PHP 8.2.12**
- **Tailwind CSS 3.0**
- **JavaScript ES6+**
- **Vite**
- **Composer**
- **Node.js**

## 📦 Requisitos del Sistema

- **PHP**: >= 8.2
- **Composer**: >= 2.0
- **Node.js**: >= 16.0
- **NPM**: >= 8.0
- **MySQL**: >= 8.0 o **PostgreSQL**: >= 13.0
- **Web Server**: Apache/Nginx

## ⚙️ Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/jaacern/dicapi.git
   cd dicapi
   ```
2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```
3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```
4. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. **Configurar base de datos y migrar**
   ```bash
   php artisan migrate
   ```

## 🏃‍♂️ Ejecución

```bash
php artisan serve
npm run dev
```

## 📄 Licencia

MIT

## 👤 Creador

- Javier Cerna
- [GitHub: jaacern](https://github.com/jaacern) 
