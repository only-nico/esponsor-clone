# 🎯 TipSee - Plataforma de Links y Apoyos para Creadores<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel)<p align="center">

![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green?style=flat-square&logo=vue.js)<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>

![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-blue?style=flat-square&logo=tailwind-css)<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>

<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>

TipSee es una plataforma moderna que permite a los creadores de contenido:<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>

- 📱 Crear una página de perfil público tipo Linktree</p>

- 🔗 Agregar y ordenar links a sus redes sociales

- 💰 Recibir apoyos/donaciones de su comunidad## About Laravel

- 📊 Ver estadísticas de apoyos recibidos

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

---

- [Simple, fast routing engine](https://laravel.com/docs/routing).

## 📋 Requisitos Previos- [Powerful dependency injection container](https://laravel.com/docs/container).

- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.

Antes de comenzar, asegúrate de tener instalado:- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).

- Database agnostic [schema migrations](https://laravel.com/docs/migrations).

- **PHP** >= 8.2- [Robust background job processing](https://laravel.com/docs/queues).

- **Composer** >= 2.0- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

- **Node.js** >= 18.x

- **NPM** >= 9.xLaravel is accessible, powerful, and provides tools required for large, robust applications.

- **SQLite** (o MySQL/PostgreSQL si prefieres)

- **Git**## Learning Laravel



### Verificar versiones instaladas:Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.



```bashIf you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

php --version

composer --version## Laravel Sponsors

node --version

npm --versionWe would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

```

### Premium Partners

---

- **[Vehikl](https://vehikl.com)**

## 🚀 Instalación y Configuración- **[Tighten Co.](https://tighten.co)**

- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**

### 1️⃣ Clonar el Repositorio- **[64 Robots](https://64robots.com)**

- **[Curotec](https://www.curotec.com/services/technologies/laravel)**

```bash- **[DevSquad](https://devsquad.com/hire-laravel-developers)**

git clone https://github.com/tu-usuario/tipsee.git- **[Redberry](https://redberry.international/laravel-development)**

cd tipsee- **[Active Logic](https://activelogic.com)**

```

## Contributing

### 2️⃣ Instalar Dependencias de PHP

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

```bash

composer install## Code of Conduct

```

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

Este comando instalará todas las dependencias de Laravel listadas en `composer.json`.

## Security Vulnerabilities

### 3️⃣ Instalar Dependencias de JavaScript

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

```bash

npm install## License

```

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Esto instalará Vue 3, Inertia.js, Tailwind CSS y todas las dependencias del frontend.

### 4️⃣ Configurar Variables de Entorno

Copia el archivo de ejemplo `.env.example` a `.env`:

```bash
# Windows (PowerShell)
Copy-Item .env.example .env

# Linux/Mac
cp .env.example .env
```

Abre el archivo `.env` y configura las siguientes variables:

#### Configuración Básica

```env
# Nombre de la aplicación
APP_NAME=TipSee
APP_ENV=local
APP_DEBUG=true
APP_TIMEZONE=UTC

# URL de la aplicación
APP_URL=http://localhost:8000

# Clave de encriptación (se genera en el paso siguiente)
APP_KEY=
```

#### Base de Datos (SQLite - Recomendado para desarrollo)

```env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=tipsee
# DB_USERNAME=root
# DB_PASSWORD=
```

> **Nota:** SQLite no requiere configuración adicional. El archivo se creará automáticamente.

#### Alternativa: Base de Datos MySQL

Si prefieres usar MySQL, configura así:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tipsee
DB_USERNAME=root
DB_PASSWORD=tu_password
```

Y crea la base de datos manualmente:

```sql
CREATE DATABASE tipsee CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### Configuración de Email (Opcional - para verificación de email)

Para desarrollo local, usa Mailtrap o log:

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS="noreply@tipsee.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Para producción con Gmail:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@tipsee.com"
MAIL_FROM_NAME="${APP_NAME}"
```

#### Configuración de Sesiones

```env
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### 5️⃣ Generar Clave de Aplicación

```bash
php artisan key:generate
```

Este comando genera una clave única en `APP_KEY` del archivo `.env`.

### 6️⃣ Crear Base de Datos SQLite

Si usas SQLite, crea el archivo de base de datos:

```bash
# Windows (PowerShell)
New-Item database/database.sqlite

# Linux/Mac
touch database/database.sqlite
```

### 7️⃣ Ejecutar Migraciones

Crea todas las tablas en la base de datos:

```bash
php artisan migrate
```

Verás una salida como:

```
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2024_xx_xx_create_creator_profiles_table
Migrated:  2024_xx_xx_create_creator_profiles_table
...
```

### 8️⃣ (Opcional) Poblar con Datos de Prueba

Si quieres datos de ejemplo para probar:

```bash
php artisan db:seed
```

### 9️⃣ Compilar Assets del Frontend

#### Para Desarrollo (con Hot Reload):

```bash
npm run dev
```

Este comando mantiene el servidor corriendo y recarga automáticamente cuando editas archivos Vue.

#### Para Producción (optimizado):

```bash
npm run build
```

Genera archivos optimizados en `public/build/`.

---

## 🏃‍♂️ Ejecutar la Aplicación

### Opción 1: Servidor de Desarrollo de Laravel

En una terminal, ejecuta:

```bash
php artisan serve
```

La aplicación estará disponible en: **http://localhost:8000**

### Opción 2: Con Laragon (Windows)

Si usas Laragon:

1. Mueve el proyecto a `C:\laragon\www\tipsee`
2. Accede a: **http://tipsee.test**

### Opción 3: Con XAMPP/WAMP

Configura un Virtual Host apuntando a la carpeta `public/` del proyecto.

---

## 🌐 Probar en Móvil (Túnel SSH)

Para probar la aplicación en tu dispositivo móvil, crea un túnel con **serveo.net**:

### Paso 1: Asegúrate que el servidor está corriendo

```bash
php artisan serve
```

### Paso 2: En otra terminal, crea el túnel

```bash
ssh -R 80:localhost:8000 serveo.net
```

Verás algo como:

```
Forwarding HTTP traffic from https://random-name.serveo.net
```

### Paso 3: Actualiza APP_URL en .env

```env
APP_URL=https://random-name.serveo.net
```

### Paso 4: Limpia la caché

```bash
php artisan config:clear
php artisan cache:clear
```

Ahora puedes acceder desde tu móvil usando la URL proporcionada.

---

## 👤 Crear Primera Cuenta

1. Visita **http://localhost:8000**
2. Haz clic en **"Registrarse"**
3. Completa el formulario:
   - Nombre: Tu nombre
   - Email: tu@email.com
   - Contraseña: mínimo 8 caracteres
4. Confirma el email (si está configurado) o usa:

```bash
# Verificar manualmente en desarrollo
php artisan tinker
>>> $user = \App\Models\User::where('email', 'tu@email.com')->first();
>>> $user->email_verified_at = now();
>>> $user->save();
>>> exit
```

5. Inicia sesión y accede al **Dashboard**

---

## 🔧 Comandos Útiles de Artisan

```bash
# Limpiar cachés
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ver todas las rutas
php artisan route:list

# Crear un nuevo usuario desde CLI
php artisan tinker

# Rollback de migraciones
php artisan migrate:rollback

# Refrescar base de datos (¡Elimina todos los datos!)
php artisan migrate:fresh

# Con seeders
php artisan migrate:fresh --seed

# Ver logs en tiempo real
php artisan log:tail
```

---

## 📁 Estructura del Proyecto

```
tipsee/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php      # Vista principal del creador
│   │   │   ├── CreatorProfileController.php # Gestión de perfil
│   │   │   ├── CreatorLinkController.php    # CRUD de links
│   │   │   ├── SupportController.php        # Procesa apoyos
│   │   │   └── PublicCreatorController.php  # Página pública
│   │   └── Requests/
│   │       └── ProfileUpdateRequest.php
│   └── Models/
│       ├── User.php
│       ├── CreatorProfile.php
│       ├── CreatorLink.php
│       └── Support.php
├── database/
│   ├── migrations/          # Estructura de tablas
│   └── database.sqlite      # Base de datos SQLite
├── resources/
│   ├── js/
│   │   ├── Components/      # Componentes reutilizables
│   │   ├── Layouts/         # Layouts (AuthenticatedLayout)
│   │   └── Pages/           # Páginas Vue
│   │       ├── Welcome.vue
│   │       ├── Dashboard.vue
│   │       ├── Auth/
│   │       ├── Profile/
│   │       └── Public/
│   └── views/
│       └── app.blade.php    # Template principal
├── routes/
│   ├── web.php              # Rutas de la aplicación
│   └── auth.php             # Rutas de autenticación
├── public/
│   └── build/               # Assets compilados (generados)
├── .env                     # Variables de entorno (NO SUBIR A GIT)
├── .env.example             # Ejemplo de configuración
├── composer.json            # Dependencias PHP
├── package.json             # Dependencias JavaScript
└── README.md                # Este archivo
```

---

## 🔑 Variables de Entorno Importantes

| Variable | Descripción | Ejemplo |
|----------|-------------|---------|
| `APP_NAME` | Nombre de la aplicación | `TipSee` |
| `APP_ENV` | Entorno de ejecución | `local` / `production` |
| `APP_DEBUG` | Mostrar errores detallados | `true` (dev) / `false` (prod) |
| `APP_URL` | URL base de la aplicación | `http://localhost:8000` |
| `DB_CONNECTION` | Tipo de base de datos | `sqlite` / `mysql` / `pgsql` |
| `MAIL_MAILER` | Driver de email | `log` / `smtp` / `ses` |

---

## 🌍 Configuración para Producción

### 1. Actualizar .env para Producción

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com

# Base de datos de producción
DB_CONNECTION=mysql
DB_HOST=tu-host-de-produccion
DB_DATABASE=nombre_bd
DB_USERNAME=usuario
DB_PASSWORD=password_seguro

# Email de producción
MAIL_MAILER=smtp
MAIL_HOST=smtp.tuproveedor.com
```

### 2. Optimizar para Producción

```bash
# Compilar assets optimizados
npm run build

# Cachear configuración
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimizar autoload de Composer
composer install --optimize-autoloader --no-dev
```

### 3. Configurar Permisos

```bash
# En servidor Linux
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 4. Configurar Web Server

#### Apache (.htaccess ya incluido)

Apunta el DocumentRoot a la carpeta `public/`.

#### Nginx

```nginx
server {
    listen 80;
    server_name tudominio.com;
    root /ruta/a/tipsee/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## 🐛 Solución de Problemas Comunes

### Error: "No application encryption key has been specified"

```bash
php artisan key:generate
```

### Error: "SQLSTATE[HY000]: General error: 1 no such table"

```bash
php artisan migrate
```

### Error: "npm ERR! code ENOENT"

```bash
rm -rf node_modules package-lock.json
npm install
```

### Los cambios en Vue no se reflejan

```bash
# Detén npm run dev (Ctrl+C)
npm run build
# Vuelve a iniciar
npm run dev
```

### Error: "Class 'X' not found"

```bash
composer dump-autoload
```

### Error: "Target class [X] does not exist"

Verifica que el namespace del controlador sea correcto en `routes/web.php`.

### HTTPS no funciona en túnel serveo.net

Agrega en `app/Providers/AppServiceProvider.php`:

```php
public function boot()
{
    if (config('app.env') === 'local' && str_contains(config('app.url'), 'https://')) {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }
}
```

---

## 📚 Documentación Adicional

- **Laravel:** https://laravel.com/docs
- **Vue 3:** https://vuejs.org/guide/introduction.html
- **Inertia.js:** https://inertiajs.com/
- **Tailwind CSS:** https://tailwindcss.com/docs
- **Documentación Técnica del Proyecto:** Ver `DOCUMENTACION_TECNICA.md`

---

## 🔐 Seguridad

- **NUNCA** subas el archivo `.env` a Git
- Cambia `APP_KEY` en cada instalación
- Usa contraseñas seguras en producción
- Activa HTTPS en producción
- Configura CORS correctamente
- Mantén Laravel y dependencias actualizadas

---

## 🤝 Contribuir

1. Haz fork del proyecto
2. Crea una rama feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit tus cambios (`git commit -m 'Agrega nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

---

## 📄 Licencia

Este proyecto es de código abierto bajo la licencia MIT.

---

## 👨‍💻 Autor

Desarrollado como proyecto de práctica profesional.

---

## 🙏 Agradecimientos

- Laravel Team
- Vue.js Team
- Inertia.js
- Tailwind CSS
- Comunidad Open Source

---

**¡Disfruta construyendo con TipSee! 🚀**
