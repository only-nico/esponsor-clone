# 🎯 TipSee - Plataforma de Links y Apoyos para Creadores# 🎯 TipSee - Plataforma de Links y Apoyos para Creadores<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel)

![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green?style=flat-square&logo=vue.js)

![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-blue?style=flat-square&logo=tailwind-css)![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel)<p align="center">



TipSee es una plataforma moderna que permite a los creadores de contenido:![Vue.js](https://img.shields.io/badge/Vue.js-3.x-green?style=flat-square&logo=vue.js)<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>

- 📱 Crear una página de perfil público tipo Linktree

- 🔗 Agregar y ordenar links a sus redes sociales![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-blue?style=flat-square&logo=tailwind-css)<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>

- 💰 Recibir apoyos/donaciones de su comunidad

- 📊 Ver estadísticas de apoyos recibidos<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>



---TipSee es una plataforma moderna que permite a los creadores de contenido:<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>



## 📋 Requisitos Previos- 📱 Crear una página de perfil público tipo Linktree</p>



Antes de comenzar, asegúrate de tener instalado:- 🔗 Agregar y ordenar links a sus redes sociales



- **PHP** >= 8.2- 💰 Recibir apoyos/donaciones de su comunidad## About Laravel

- **Composer** >= 2.0

- **Node.js** >= 18.x- 📊 Ver estadísticas de apoyos recibidos

- **NPM** >= 9.x

- **SQLite** (o MySQL/PostgreSQL si prefieres)

- **Git**---



### Verificar versiones instaladas:- [Simple, fast routing engine](https://laravel.com/docs/routing).



```bash## 📋 Requisitos Previos- [Powerful dependency injection container](https://laravel.com/docs/container).

php --version

composer --versionAntes de comenzar, asegúrate de tener instalado:

node --version

npm --version

```

- **PHP** >= 8.2- 

---

- **Composer** >= 2.0- 

## 🚀 Instalación y Configuración

- **Node.js** >= 18.x

### 1️⃣ Clonar el Repositorio

- **NPM** >= 9.x

```bash

git clone https://github.com/only-nico/esponsor-clone.git- **SQLite** (o MySQL/PostgreSQL si prefieres)

cd esponsor-clone

```- **Git**## Learning Laravel



### 2️⃣ Instalar Dependencias de PHP



```bash### Verificar versiones instaladas

composer install

```php --version



**¿Qué hace este comando?**composer --version## Laravel Sponsors

- Lee el archivo `composer.json` que contiene la lista de dependencias PHP

- Descarga e instala Laravel y todos sus paquetes necesarios (Inertia, Breeze, etc.)node --version

- Crea la carpeta `vendor/` con todas las librerías

- Genera el autoloader de clases (`vendor/autoload.php`)npm --version



### 3️⃣ Instalar Dependencias de JavaScript```



```bash

npm install## 🚀 Instalación y Configuración

```

- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**

**¿Qué hace este comando?**

- Lee el archivo `package.json` que contiene las dependencias JavaScript### 1️⃣ Clonar el Repositorio

- Descarga e instala Vue 3, Inertia.js, Tailwind CSS, Vite y otros paquetes

- Crea la carpeta `node_modules/` con todas las librerías del frontend

- Genera el archivo `package-lock.json` con las versiones exactas instaladas```bash



### 4️⃣ Configurar Variables de Entornogit clone https://github.com/tu-usuario/tipsee.git- 



Copia el archivo de ejemplo `.env.example` a `.env`:cd esponsor-clone 



```bash```

# Windows (PowerShell)

Copy-Item .env.example .env

### 2️⃣ Instalar Dependencias de PHP

# Linux/Mac

cp .env.example .env

```

```bash

Abre el archivo `.env` y configura las siguientes variables:

composer install

#### Configuración Básica

```

```env

# Nombre de la aplicaciónEste comando instalará todas las dependencias de Laravel listadas en `composer.json`.

APP_NAME=TipSee

APP_ENV=local

APP_DEBUG=true### 3️⃣ Instalar Dependencias de JavaScript

APP_TIMEZONE=UTC



# URL de la aplicación```bash

APP_URL=http://localhost:8000

npm install## License

# Clave de encriptación (se genera en el paso siguiente)

APP_KEY=```

```

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

#### Base de Datos (SQLite - Recomendado para desarrollo)

Esto instalará Vue 3, Inertia.js, Tailwind CSS y todas las dependencias del frontend.

```env

DB_CONNECTION=sqlite### 4️⃣ Configurar Variables de Entorno

# DB_HOST=127.0.0.1

# DB_PORT=3306Copia el archivo de ejemplo `.env.example` a `.env`:

# DB_DATABASE=tipsee

# DB_USERNAME=root```bash

# DB_PASSWORD=# Windows (PowerShell)

```Copy-Item .env.example .env



> **Nota:** SQLite no requiere configuración adicional. El archivo se creará automáticamente.# Linux/Mac

cp .env.example .env

#### Alternativa: Base de Datos MySQL```



Si prefieres usar MySQL, configura así:Abre el archivo `.env` y configura las siguientes variables:



```env#### Configuración Básica

DB_CONNECTION=mysql

DB_HOST=127.0.0.1```env

DB_PORT=3306# Nombre de la aplicación

DB_DATABASE=tipseeAPP_NAME=TipSee

DB_USERNAME=rootAPP_ENV=local

DB_PASSWORD=tu_passwordAPP_DEBUG=true

```APP_TIMEZONE=UTC



Y crea la base de datos manualmente:# URL de la aplicación

APP_URL=http://localhost:8000

```sql

CREATE DATABASE tipsee CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;# Clave de encriptación (se genera en el paso siguiente)

```APP_KEY=

```

#### Configuración de Email (Opcional - para verificación de email)

#### Base de Datos (SQLite - Recomendado para desarrollo)

Para desarrollo local, usa Mailtrap o log:

```env

```envDB_CONNECTION=sqlite

MAIL_MAILER=log# DB_HOST=127.0.0.1

MAIL_FROM_ADDRESS="noreply@tipsee.com"# DB_PORT=3306

MAIL_FROM_NAME="${APP_NAME}"# DB_DATABASE=tipsee

```# DB_USERNAME=root

# DB_PASSWORD=

Para producción con Gmail:```



```env> **Nota:** SQLite no requiere configuración adicional. El archivo se creará automáticamente.

MAIL_MAILER=smtp

MAIL_HOST=smtp.gmail.com#### Alternativa: Base de Datos MySQL

MAIL_PORT=587

MAIL_USERNAME=tu-email@gmail.comSi prefieres usar MySQL, configura así:

MAIL_PASSWORD=tu-app-password

MAIL_ENCRYPTION=tls```env

MAIL_FROM_ADDRESS="noreply@tipsee.com"DB_CONNECTION=mysql

MAIL_FROM_NAME="${APP_NAME}"DB_HOST=127.0.0.1

```DB_PORT=3306

DB_DATABASE=tipsee

#### Configuración de SesionesDB_USERNAME=root

DB_PASSWORD=tu_password

```env```

SESSION_DRIVER=file

SESSION_LIFETIME=120Y crea la base de datos manualmente:

```

```sql

### 5️⃣ Generar Clave de AplicaciónCREATE DATABASE tipsee CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

```

```bash

php artisan key:generate#### Configuración de Email (Opcional - para verificación de email)

```

Para desarrollo local, usa Mailtrap o log:

Este comando genera una clave única en `APP_KEY` del archivo `.env`.

```env

### 6️⃣ Crear Base de Datos SQLiteMAIL_MAILER=log

MAIL_FROM_ADDRESS="noreply@tipsee.com"

Si usas SQLite, crea el archivo de base de datos:MAIL_FROM_NAME="${APP_NAME}"

```

```bash

# Windows (PowerShell)Para producción con Gmail:

New-Item database/database.sqlite

```env

# Linux/MacMAIL_MAILER=smtp

touch database/database.sqliteMAIL_HOST=smtp.gmail.com

```MAIL_PORT=587

MAIL_USERNAME=tu-email@gmail.com

### 7️⃣ Ejecutar MigracionesMAIL_PASSWORD=tu-app-password

MAIL_ENCRYPTION=tls

Crea todas las tablas en la base de datos:MAIL_FROM_ADDRESS="noreply@tipsee.com"

MAIL_FROM_NAME="${APP_NAME}"

```bash```

php artisan migrate

```#### Configuración de Sesiones



Verás una salida como:```env

SESSION_DRIVER=file

```SESSION_LIFETIME=120

Migration table created successfully.```

Migrating: 2014_10_12_000000_create_users_table

Migrated:  2014_10_12_000000_create_users_table### 5️⃣ Generar Clave de Aplicación

Migrating: 2024_xx_xx_create_creator_profiles_table

Migrated:  2024_xx_xx_create_creator_profiles_table```bash

...php artisan key:generate

``````



### 8️⃣ (Opcional) Poblar con Datos de PruebaEste comando genera una clave única en `APP_KEY` del archivo `.env`.



Si quieres datos de ejemplo para probar:### 6️⃣ Crear Base de Datos SQLite



```bashSi usas SQLite, crea el archivo de base de datos:

php artisan db:seed

``````bash

# Windows (PowerShell)

### 9️⃣ Compilar Assets del FrontendNew-Item database/database.sqlite



#### Para Desarrollo (con Hot Reload):# Linux/Mac

touch database/database.sqlite

```bash```

npm run dev

```### 7️⃣ Ejecutar Migraciones



Este comando mantiene el servidor corriendo y recarga automáticamente cuando editas archivos Vue.Crea todas las tablas en la base de datos:



#### Para Producción (optimizado):```bash

php artisan migrate

```bash```

npm run build

```Verás una salida como:



Genera archivos optimizados en `public/build/`.```

Migration table created successfully.

---Migrating: 2014_10_12_000000_create_users_table

Migrated:  2014_10_12_000000_create_users_table

## 🏃‍♂️ Ejecutar la AplicaciónMigrating: 2024_xx_xx_create_creator_profiles_table

Migrated:  2024_xx_xx_create_creator_profiles_table

### Opción 1: Servidor de Desarrollo de Laravel...

```

En una terminal, ejecuta:

### 8️⃣ (Opcional) Poblar con Datos de Prueba

```bash

php artisan serveSi quieres datos de ejemplo para probar:

```

```bash

La aplicación estará disponible en: **http://localhost:8000**php artisan db:seed

```

### Opción 2: Con Laragon (Windows)

### 9️⃣ Compilar Assets del Frontend

Si usas Laragon:

#### Para Desarrollo (con Hot Reload):

1. Mueve el proyecto a `C:\laragon\www\esponsor-clone`

2. Accede a: **http://esponsor-clone.test**```bash

npm run dev

### Opción 3: Con XAMPP/WAMP```



Configura un Virtual Host apuntando a la carpeta `public/` del proyecto.Este comando mantiene el servidor corriendo y recarga automáticamente cuando editas archivos Vue.



---#### Para Producción (optimizado):



## 🌐 Probar en Móvil (Túnel SSH)```bash

npm run build

Para probar la aplicación en tu dispositivo móvil, crea un túnel con **serveo.net**:```



### Paso 1: Asegúrate que el servidor está corriendoGenera archivos optimizados en `public/build/`.



```bash---

php artisan serve

```## 🏃‍♂️ Ejecutar la Aplicación



### Paso 2: En otra terminal, crea el túnel### Opción 1: Servidor de Desarrollo de Laravel



```bashEn una terminal, ejecuta:

ssh -R 80:localhost:8000 serveo.net

``````bash

php artisan serve

Verás algo como:```



```La aplicación estará disponible en: **http://localhost:8000**

Forwarding HTTP traffic from https://random-name.serveo.net

```### Opción 2: Con Laragon (Windows)



### Paso 3: Actualiza APP_URL en .envSi usas Laragon:



```env1. Mueve el proyecto a `C:\laragon\www\tipsee`

APP_URL=https://random-name.serveo.net2. Accede a: **http://tipsee.test**

```

### Opción 3: Con XAMPP/WAMP

### Paso 4: Limpia la caché

Configura un Virtual Host apuntando a la carpeta `public/` del proyecto.

```bash

php artisan config:clear---

php artisan cache:clear

```## 🌐 Probar en Móvil (Túnel SSH)



Ahora puedes acceder desde tu móvil usando la URL proporcionada.Para probar la aplicación en tu dispositivo móvil, crea un túnel con **serveo.net**:



---### Paso 1: Asegúrate que el servidor está corriendo



## 👤 Crear Primera Cuenta```bash

php artisan serve

1. Visita **http://localhost:8000**```

2. Haz clic en **"Registrarse"**

3. Completa el formulario:### Paso 2: En otra terminal, crea el túnel

   - Nombre: Tu nombre

   - Email: tu@email.com```bash

   - Contraseña: mínimo 8 caracteresssh -R 80:localhost:8000 serveo.net

4. Confirma el email (si está configurado) o usa:```



```bashVerás algo como:

# Verificar manualmente en desarrollo

php artisan tinker```

>>> $user = \App\Models\User::where('email', 'tu@email.com')->first();Forwarding HTTP traffic from https://random-name.serveo.net

>>> $user->email_verified_at = now();```

>>> $user->save();

>>> exit### Paso 3: Actualiza APP_URL en .env

```

```env

5. Inicia sesión y accede al **Dashboard**APP_URL=https://random-name.serveo.net

```

---

### Paso 4: Limpia la caché

## 🔧 Comandos Útiles de Artisan

```bash

```bashphp artisan config:clear

# Limpiar cachésphp artisan cache:clear

php artisan cache:clear```

php artisan config:clear

php artisan route:clearAhora puedes acceder desde tu móvil usando la URL proporcionada.

php artisan view:clear

---

# Ver todas las rutas

php artisan route:list## 👤 Crear Primera Cuenta



# Crear un nuevo usuario desde CLI1. Visita **http://localhost:8000**

php artisan tinker2. Haz clic en **"Registrarse"**

3. Completa el formulario:

# Rollback de migraciones   - Nombre: Tu nombre

php artisan migrate:rollback   - Email: tu@email.com

   - Contraseña: mínimo 8 caracteres

# Refrescar base de datos (¡Elimina todos los datos!)4. Confirma el email (si está configurado) o usa:

php artisan migrate:fresh

```bash

# Con seeders# Verificar manualmente en desarrollo

php artisan migrate:fresh --seedphp artisan tinker

```>>> $user = \App\Models\User::where('email', 'tu@email.com')->first();

>>> $user->email_verified_at = now();

--->>> $user->save();

>>> exit

## 📁 Estructura del Proyecto```



```5. Inicia sesión y accede al **Dashboard**

esponsor-clone/

├── app/---

│   ├── Http/

│   │   ├── Controllers/## 🔧 Comandos Útiles de Artisan

│   │   │   ├── DashboardController.php      # Vista principal del creador

│   │   │   ├── CreatorProfileController.php # Gestión de perfil```bash

│   │   │   ├── CreatorLinkController.php    # CRUD de links# Limpiar cachés

│   │   │   ├── SupportController.php        # Procesa apoyosphp artisan cache:clear

│   │   │   └── PublicCreatorController.php  # Página públicaphp artisan config:clear

│   │   └── Requests/php artisan route:clear

│   │       └── ProfileUpdateRequest.phpphp artisan view:clear

│   └── Models/

│       ├── User.php# Ver todas las rutas

│       ├── CreatorProfile.phpphp artisan route:list

│       ├── CreatorLink.php

│       └── Support.php# Crear un nuevo usuario desde CLI

├── database/php artisan tinker

│   ├── migrations/          # Estructura de tablas

│   └── database.sqlite      # Base de datos SQLite# Rollback de migraciones

├── resources/php artisan migrate:rollback

│   ├── js/

│   │   ├── Components/      # Componentes reutilizables# Refrescar base de datos (¡Elimina todos los datos!)

│   │   ├── Layouts/         # Layouts (AuthenticatedLayout)php artisan migrate:fresh

│   │   └── Pages/           # Páginas Vue

│   │       ├── Welcome.vue# Con seeders

│   │       ├── Dashboard.vuephp artisan migrate:fresh --seed

│   │       ├── Auth/

│   │       ├── Profile/# Ver logs en tiempo real

│   │       └── Public/php artisan log:tail

│   └── views/```

│       └── app.blade.php    # Template principal

├── routes/---

│   ├── web.php              # Rutas de la aplicación

│   └── auth.php             # Rutas de autenticación## 📁 Estructura del Proyecto

├── public/

│   └── build/               # Assets compilados (generados)```

├── .env                     # Variables de entorno (NO SUBIR A GIT)tipsee/

├── .env.example             # Ejemplo de configuración├── app/

├── composer.json            # Dependencias PHP│   ├── Http/

├── package.json             # Dependencias JavaScript│   │   ├── Controllers/

└── README.md                # Este archivo│   │   │   ├── DashboardController.php      # Vista principal del creador

```│   │   │   ├── CreatorProfileController.php # Gestión de perfil

│   │   │   ├── CreatorLinkController.php    # CRUD de links

---│   │   │   ├── SupportController.php        # Procesa apoyos

│   │   │   └── PublicCreatorController.php  # Página pública

## 🔑 Variables de Entorno Importantes│   │   └── Requests/

│   │       └── ProfileUpdateRequest.php

| Variable | Descripción | Ejemplo |│   └── Models/

|----------|-------------|---------|│       ├── User.php

| `APP_NAME` | Nombre de la aplicación | `TipSee` |│       ├── CreatorProfile.php

| `APP_ENV` | Entorno de ejecución | `local` / `production` |│       ├── CreatorLink.php

| `APP_DEBUG` | Mostrar errores detallados | `true` (dev) / `false` (prod) |│       └── Support.php

| `APP_URL` | URL base de la aplicación | `http://localhost:8000` |├── database/

| `DB_CONNECTION` | Tipo de base de datos | `sqlite` / `mysql` / `pgsql` |│   ├── migrations/          # Estructura de tablas

| `MAIL_MAILER` | Driver de email | `log` / `smtp` / `ses` |│   └── database.sqlite      # Base de datos SQLite

├── resources/

---│   ├── js/

│   │   ├── Components/      # Componentes reutilizables

## 🌍 Configuración para Producción│   │   ├── Layouts/         # Layouts (AuthenticatedLayout)

│   │   └── Pages/           # Páginas Vue

### 1. Actualizar .env para Producción│   │       ├── Welcome.vue

│   │       ├── Dashboard.vue

```env│   │       ├── Auth/

APP_ENV=production│   │       ├── Profile/

APP_DEBUG=false│   │       └── Public/

APP_URL=https://tudominio.com│   └── views/

│       └── app.blade.php    # Template principal

# Base de datos de producción├── routes/

DB_CONNECTION=mysql│   ├── web.php              # Rutas de la aplicación

DB_HOST=tu-host-de-produccion│   └── auth.php             # Rutas de autenticación

DB_DATABASE=nombre_bd├── public/

DB_USERNAME=usuario│   └── build/               # Assets compilados (generados)

DB_PASSWORD=password_seguro├── .env                     # Variables de entorno (NO SUBIR A GIT)

├── .env.example             # Ejemplo de configuración

# Email de producción├── composer.json            # Dependencias PHP

MAIL_MAILER=smtp├── package.json             # Dependencias JavaScript

MAIL_HOST=smtp.tuproveedor.com└── README.md                # Este archivo

``````



### 2. Optimizar para Producción---



```bash## 🔑 Variables de Entorno Importantes

# Compilar assets optimizados

npm run build| Variable | Descripción | Ejemplo |

|----------|-------------|---------|

# Cachear configuración| `APP_NAME` | Nombre de la aplicación | `TipSee` |

php artisan config:cache| `APP_ENV` | Entorno de ejecución | `local` / `production` |

php artisan route:cache| `APP_DEBUG` | Mostrar errores detallados | `true` (dev) / `false` (prod) |

php artisan view:cache| `APP_URL` | URL base de la aplicación | `http://localhost:8000` |

| `DB_CONNECTION` | Tipo de base de datos | `sqlite` / `mysql` / `pgsql` |

# Optimizar autoload de Composer| `MAIL_MAILER` | Driver de email | `log` / `smtp` / `ses` |

composer install --optimize-autoloader --no-dev

```---



### 3. Configurar Permisos## 🌍 Configuración para Producción



```bash### 1. Actualizar .env para Producción

# En servidor Linux

chmod -R 775 storage bootstrap/cache```env

chown -R www-data:www-data storage bootstrap/cacheAPP_ENV=production

```APP_DEBUG=false

APP_URL=https://tudominio.com

### 4. Configurar Web Server

# Base de datos de producción

#### Apache (.htaccess ya incluido)DB_CONNECTION=mysql

DB_HOST=tu-host-de-produccion

Apunta el DocumentRoot a la carpeta `public/`.DB_DATABASE=nombre_bd

DB_USERNAME=usuario

#### NginxDB_PASSWORD=password_seguro



```nginx# Email de producción

server {MAIL_MAILER=smtp

    listen 80;MAIL_HOST=smtp.tuproveedor.com

    server_name tudominio.com;```

    root /ruta/a/esponsor-clone/public;

### 2. Optimizar para Producción

    add_header X-Frame-Options "SAMEORIGIN";

    add_header X-Content-Type-Options "nosniff";```bash

# Compilar assets optimizados

    index index.php;npm run build



    charset utf-8;# Cachear configuración

php artisan config:cache

    location / {php artisan route:cache

        try_files $uri $uri/ /index.php?$query_string;php artisan view:cache

    }

# Optimizar autoload de Composer

    location ~ \.php$ {composer install --optimize-autoloader --no-dev

        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;```

        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;

        include fastcgi_params;### 3. Configurar Permisos

    }

```bash

    location ~ /\.(?!well-known).* {# En servidor Linux

        deny all;chmod -R 775 storage bootstrap/cache

    }chown -R www-data:www-data storage bootstrap/cache

}```

```

### 4. Configurar Web Server

---

#### Apache (.htaccess ya incluido)

## 🐛 Solución de Problemas Comunes

Apunta el DocumentRoot a la carpeta `public/`.

### Error: "No application encryption key has been specified"

#### Nginx

```bash

php artisan key:generate```nginx

```server {

    listen 80;

### Error: "SQLSTATE[HY000]: General error: 1 no such table"    server_name tudominio.com;

    root /ruta/a/tipsee/public;

```bash

php artisan migrate    add_header X-Frame-Options "SAMEORIGIN";

```    add_header X-Content-Type-Options "nosniff";



### Error: "npm ERR! code ENOENT"    index index.php;



```bash    charset utf-8;

rm -rf node_modules package-lock.json

npm install    location / {

```        try_files $uri $uri/ /index.php?$query_string;

    }

### Los cambios en Vue no se reflejan

    location ~ \.php$ {

```bash        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;

# Detén npm run dev (Ctrl+C)        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;

npm run build        include fastcgi_params;

# Vuelve a iniciar    }

npm run dev

```    location ~ /\.(?!well-known).* {

        deny all;

### Error: "Class 'X' not found"    }

}

```bash```

composer dump-autoload

```---



### Error: "Target class [X] does not exist"## 🐛 Solución de Problemas Comunes



Verifica que el namespace del controlador sea correcto en `routes/web.php`.### Error: "No application encryption key has been specified"



### HTTPS no funciona en túnel serveo.net```bash

php artisan key:generate

Agrega en `app/Providers/AppServiceProvider.php`:```



```php### Error: "SQLSTATE[HY000]: General error: 1 no such table"

public function boot()

{```bash

    if (config('app.env') === 'local' && str_contains(config('app.url'), 'https://')) {php artisan migrate

        \Illuminate\Support\Facades\URL::forceScheme('https');```

    }

}### Error: "npm ERR! code ENOENT"

```

```bash

---rm -rf node_modules package-lock.json

npm install

## 📚 Documentación Adicional```



- **Laravel:** https://laravel.com/docs### Los cambios en Vue no se reflejan

- **Vue 3:** https://vuejs.org/guide/introduction.html

- **Inertia.js:** https://inertiajs.com/```bash

- **Tailwind CSS:** https://tailwindcss.com/docs# Detén npm run dev (Ctrl+C)

- **Documentación Técnica del Proyecto:** Ver `DOCUMENTACION_TECNICA.md`npm run build

# Vuelve a iniciar

---npm run dev

```

## 🔐 Seguridad

### Error: "Class 'X' not found"

- **NUNCA** subas el archivo `.env` a Git

- Cambia `APP_KEY` en cada instalación```bash

- Usa contraseñas seguras en produccióncomposer dump-autoload

- Activa HTTPS en producción```

- Configura CORS correctamente

- Mantén Laravel y dependencias actualizadas### Error: "Target class [X] does not exist"



---Verifica que el namespace del controlador sea correcto en `routes/web.php`.



## 🤝 Contribuir### HTTPS no funciona en túnel serveo.net



1. Haz fork del proyectoAgrega en `app/Providers/AppServiceProvider.php`:

2. Crea una rama feature (`git checkout -b feature/nueva-funcionalidad`)

3. Commit tus cambios (`git commit -m 'Agrega nueva funcionalidad'`)```php

4. Push a la rama (`git push origin feature/nueva-funcionalidad`)public function boot()

5. Abre un Pull Request{

    if (config('app.env') === 'local' && str_contains(config('app.url'), 'https://')) {

---        \Illuminate\Support\Facades\URL::forceScheme('https');

    }

## 📄 Licencia}

```

Este proyecto es de código abierto bajo la licencia MIT.

---

---

## 📚 Documentación Adicional

## 👨‍💻 Autor

- **Laravel:** https://laravel.com/docs

Desarrollado por **Nicolás** como proyecto de práctica profesional.- **Vue 3:** https://vuejs.org/guide/introduction.html

- **Inertia.js:** https://inertiajs.com/

**GitHub:** [@only-nico](https://github.com/only-nico)- **Tailwind CSS:** https://tailwindcss.com/docs

- **Documentación Técnica del Proyecto:** Ver `DOCUMENTACION_TECNICA.md`

---

---

## 🙏 Agradecimientos

## 🔐 Seguridad

- Laravel Team

- Vue.js Team- **NUNCA** subas el archivo `.env` a Git

- Inertia.js- Cambia `APP_KEY` en cada instalación

- Tailwind CSS- Usa contraseñas seguras en producción

- Comunidad Open Source- Activa HTTPS en producción

- Configura CORS correctamente

---- Mantén Laravel y dependencias actualizadas



**¡Disfruta construyendo con TipSee! 🚀**---


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
