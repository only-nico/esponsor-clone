# 🎯 TipSee - Plataforma de Links y Apoyos para Creadores

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel)
![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green?style=flat-square&logo=vue.js)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-blue?style=flat-square&logo=tailwind-css)

TipSee es una plataforma moderna que permite a los creadores de contenido:

- 📱 Crear una página de perfil público tipo Linktree
- 🔗 Agregar y ordenar links a sus redes sociales
- 💰 Recibir apoyos/donaciones de su comunidad
- 📊 Ver estadísticas de apoyos recibidos

---

## 📋 Requisitos Previos

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** >= 9.x
- **SQLite** (o MySQL/PostgreSQL)

---

## 🚀 Instalación y Configuración

### 1️⃣ Clonar el Repositorio

```bash
git clone https://github.com/only-nico/esponsor-clone.git
cd esponsor-clone
```

### 2️⃣ Instalar Dependencias

```bash
composer install
npm install
```

### 3️⃣ Configurar Variables de Entorno

```bash
# Windows (PowerShell)
Copy-Item .env.example .env

# Linux/Mac
cp .env.example .env
```

Configuración básica en `.env`:

```env
APP_NAME=TipSee
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
```

### 4️⃣ Generar Clave y Preparar Base de Datos

```bash
php artisan key:generate

# Windows (PowerShell)
New-Item database/database.sqlite

# Linux/Mac
touch database/database.sqlite
```

### 5️⃣ Ejecutar Migraciones

```bash
php artisan migrate
```

### 6️⃣ Compilar Assets del Frontend

```bash
npm run dev
```

### 7️⃣ Iniciar Servidor

En otra terminal:

```bash
php artisan serve
```

La aplicación estará disponible en: **http://localhost:8000**

---

## 📁 Estructura del Proyecto

```
esponsor-clone/
├── app/
│   ├── Http/Controllers/
│   │   ├── DashboardController.php
│   │   ├── CreatorProfileController.php
│   │   ├── CreatorLinkController.php
│   │   ├── SupportController.php
│   │   └── PublicCreatorController.php
│   └── Models/
│       ├── User.php
│       ├── CreatorProfile.php
│       ├── CreatorLink.php
│       └── Support.php
├── database/
│   └── migrations/
├── resources/
│   ├── js/
│   │   ├── Components/
│   │   ├── Layouts/
│   │   └── Pages/
│   └── views/
├── routes/
│   ├── web.php
│   └── auth.php
└── .env
```

---

## 🔧 Comandos Útiles

```bash
# Limpiar cachés
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Ver rutas
php artisan route:list

# Refrescar base de datos
php artisan migrate:fresh

# Compilar para producción
npm run build
```

---

## 👤 Uso

1. **Registrarse:** Crea una cuenta en `/register`
2. **Crear perfil:** Completa tu perfil de creador en el dashboard
3. **Agregar links:** Agrega tus redes sociales y links importantes
4. **Compartir:** Tu página estará disponible en `/@tu-username`
5. **Recibir apoyos:** Los visitantes pueden enviarte apoyos desde tu página

---

## 🌍 Configuración para MySQL (Opcional)

Si prefieres usar MySQL en lugar de SQLite:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tipsee
DB_USERNAME=root
DB_PASSWORD=tu_password
```

Crea la base de datos:

```sql
CREATE DATABASE tipsee CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

---

## 🐛 Solución de Problemas

### Error: "No application encryption key"

```bash
php artisan key:generate
```

### Error: "SQLSTATE[HY000]: no such table"

```bash
php artisan migrate
```

### Los cambios en Vue no se reflejan

```bash
# Detén npm run dev (Ctrl+C)
npm run build
npm run dev
```

---

## 📚 Stack Tecnológico

- **Backend:** Laravel 12 (PHP 8.2)
- **Frontend:** Vue 3 + Inertia.js
- **Estilos:** Tailwind CSS
- **Base de Datos:** SQLite / MySQL
- **Build Tool:** Vite

---

## 📖 Documentación

- [Documentación Técnica Completa](DOCUMENTACION_TECNICA.md)
- [Laravel](https://laravel.com/docs)
- [Vue 3](https://vuejs.org/)
- [Inertia.js](https://inertiajs.com/)
- [Tailwind CSS](https://tailwindcss.com/)

---

## 📄 Licencia

Este proyecto es de código abierto bajo la licencia MIT.

---

## 👨‍💻 Autor

Desarrollado por **Nicolás** como proyecto de práctica profesional.

**GitHub:** [@only-nico](https://github.com/only-nico)

---

**¡Disfruta construyendo con TipSee! 🚀**
