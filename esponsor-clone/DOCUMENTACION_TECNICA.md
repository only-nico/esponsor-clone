# 📚 DOCUMENTACIÓN TÉCNICA - TipSee

## 🎯 Visión General del Proyecto

**TipSee** es una plataforma tipo Linktree/Ko-fi donde creadores pueden:
1. Crear un perfil público con su nombre y biografía
2. Agregar links a sus redes sociales/proyectos
3. Recibir apoyos/donaciones de su comunidad

---

## 🏗️ ARQUITECTURA DEL PROYECTO

### 1. **Stack Tecnológico (¿Por qué estas tecnologías?)**

#### Backend: **Laravel 12**
**Decisión:** Usar Laravel como backend
**Razón:**
- Framework PHP maduro y robusto con excelente documentación
- ORM Eloquent para manejo elegante de base de datos
- Sistema de autenticación Breeze integrado
- Middleware para protección de rutas
- Validación de datos robusta y expresiva

#### Frontend: **Vue 3 + Inertia.js**
**Decisión:** Vue 3 con Composition API + Inertia.js
**Razón:**
- **Inertia.js:** Permite crear SPA sin necesidad de API REST completa
  - El backend renderiza componentes Vue directamente
  - No hay duplicación de rutas (frontend/backend)
  - Sin necesidad de Axios o fetch manual
- **Vue 3 Composition API:** Código más limpio y reutilizable
- **`<script setup>`:** Sintaxis moderna y concisa

#### Estilos: **Tailwind CSS**
**Decisión:** Usar Tailwind en lugar de CSS custom o Bootstrap
**Razón:**
- Clases utilitarias permiten diseñar sin salir del HTML
- Sistema de diseño consistente (spacing, colors)
- Responsive design con prefijos (sm:, md:, lg:)
- Purge CSS automático = archivo final pequeño
- Gradientes y transformaciones fáciles

---

## 📂 ESTRUCTURA DE ARCHIVOS (¿Por qué esta organización?)

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── DashboardController.php      ← Vista principal del creador
│   │   ├── CreatorProfileController.php ← Gestiona perfil de creador
│   │   ├── CreatorLinkController.php    ← CRUD de links
│   │   ├── SupportController.php        ← Procesa donaciones
│   │   ├── PublicCreatorController.php  ← Página pública (@username)
│   │   └── ProfileController.php        ← Configuración de cuenta
│   └── Requests/
│       └── ProfileUpdateRequest.php     ← Validación de perfil
└── Models/
    ├── User.php                 ← Usuario del sistema
    ├── CreatorProfile.php       ← Perfil público del creador
    ├── CreatorLink.php          ← Links del creador
    └── Support.php              ← Apoyos recibidos

resources/js/
├── Components/              ← Componentes reutilizables
│   ├── InputError.vue      ← Mensajes de error
│   ├── Dropdown.vue        ← Menú desplegable
│   └── NavLink.vue         ← Links de navegación
├── Layouts/
│   └── AuthenticatedLayout.vue  ← Layout para usuarios autenticados
└── Pages/
    ├── Welcome.vue         ← Página principal
    ├── Dashboard.vue       ← Panel del creador
    ├── Auth/               ← Login, Register, etc.
    ├── Profile/            ← Configuración de cuenta
    │   └── Partials/       ← Formularios separados
    └── Public/
        └── Creator.vue     ← Página pública del creador
```

### **¿Por qué separar controladores en lugar de uno solo?**

❌ **Mal:** Un solo `CreatorController` con 20 métodos
```php
class CreatorController {
    public function dashboard() { ... }
    public function updateProfile() { ... }
    public function storeLink() { ... }
    public function deleteLink() { ... }
    public function showPublic() { ... }
    public function processSupport() { ... }
    // ... más métodos
}
```

✅ **Bien:** Controladores específicos por responsabilidad
```php
DashboardController       → Solo muestra el dashboard
CreatorProfileController  → Solo gestiona el perfil
CreatorLinkController     → Solo maneja links
SupportController         → Solo procesa apoyos
PublicCreatorController   → Solo página pública
```

**Beneficios:**
- Código más legible y mantenible
- Fácil encontrar dónde está cada funcionalidad
- Testing más simple (cada clase tiene una responsabilidad)
- Sigue el principio SOLID: Single Responsibility

---

## 🔄 FLUJO DE DATOS (¿Cómo funciona Inertia.js?)

### Ejemplo: Mostrar el Dashboard

```
1. Usuario visita /dashboard
    ↓
2. Laravel ejecuta: DashboardController@index
    ↓
3. Controller obtiene datos del usuario:
   - Perfil del creador
   - Links
   - Apoyos recibidos
   - Estadísticas
    ↓
4. Controller retorna: Inertia::render('Dashboard', $data)
    ↓
5. Inertia envía JSON al frontend con:
   - Nombre del componente: 'Dashboard'
   - Props: { profile, links, supports, stats }
    ↓
6. Vue renderiza Dashboard.vue con esos props
    ↓
7. Usuario ve la página (sin recarga completa)
```

**¿Por qué Inertia en lugar de API REST tradicional?**

❌ **API REST tradicional:**
```javascript
// Frontend debe hacer fetch manual
const response = await fetch('/api/dashboard')
const data = await response.json()
// Manejar loading, errores, etc.
```

✅ **Con Inertia:**
```php
// Backend
return Inertia::render('Dashboard', $data);

// Frontend (automático)
<script setup>
const props = defineProps({
    profile: Object,
    links: Array,
    // Inertia inyecta automáticamente
});
</script>
```

**Beneficios:**
- No hay endpoint `/api/dashboard` separado
- No hay doble definición de rutas
- Datos tipados desde el backend
- Manejo automático de errores

---

## 🗄️ BASE DE DATOS (¿Por qué estas tablas?)

### Esquema de relaciones:

```
users (Tabla de Laravel Breeze)
├── id
├── name
├── email
├── password
└── email_verified_at

creator_profiles (Perfil público del creador)
├── id
├── user_id          ← FK a users (1 usuario = 1 perfil)
├── slug             ← URL personalizada (@nicolas)
├── display_name     ← Nombre para mostrar
├── bio              ← Biografía
└── avatar_url       ← URL de imagen

creator_links (Links del creador)
├── id
├── creator_profile_id  ← FK a creator_profiles
├── title               ← "Mi YouTube"
├── url                 ← "https://youtube.com/..."
└── order               ← Orden de aparición (drag & drop)

supports (Apoyos recibidos)
├── id
├── creator_profile_id  ← FK a creator_profiles
├── supporter_name      ← Nombre de quien apoya
├── supporter_email     ← Email
├── amount              ← Monto de la donación
└── message             ← Mensaje opcional
```

### **¿Por qué separar User y CreatorProfile?**

**Decisión:** Tabla separada `creator_profiles` en lugar de campos en `users`

**Razón:**
1. **Separación de conceptos:**
   - `users` = Autenticación (nombre, email, password)
   - `creator_profiles` = Información pública (slug, bio, avatar)

2. **No todos los usuarios son creadores:**
   - En el futuro podrías tener usuarios que solo apoyan
   - Evita campos NULL en la tabla users

3. **Escalabilidad:**
   - Puedes agregar más campos al perfil sin tocar users
   - Mejor organización de datos

### **¿Por qué el campo `order` en creator_links?**

**Decisión:** Campo `order` de tipo entero

**Razón:**
- Permite ordenar los links manualmente (drag & drop)
- El creador puede priorizar qué links aparecen primero
- Consulta simple: `->orderBy('order')`

---

## 🎨 DISEÑO FRONTEND (¿Por qué estas decisiones?)

### **1. Fuente Cursiva "Pacifico" para el logo**

```html
<h1 style="font-family: 'Pacifico', cursive;">TipSee</h1>
```

**Decisión:** Fuente Google Fonts "Pacifico"
**Razón:**
- Da personalidad y distinción a la marca
- Fuente amigable y creativa (target: creadores de contenido)
- Carga rápida desde CDN de Google

### **2. Gradientes Purple-Indigo-Blue**

```css
bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600
```

**Decisión:** Gradientes en lugar de colores sólidos
**Razón:**
- Visualmente más atractivo y moderno
- Colores asociados con creatividad y tecnología
- Consistencia visual en todas las páginas

### **3. Componentes Reutilizables**

```vue
<!-- InputError.vue -->
<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message" class="text-sm text-red-600">
        {{ message }}
    </div>
</template>
```

**Decisión:** Componente pequeño para errores
**Razón:**
- Se usa en 8+ formularios diferentes
- Si cambia el diseño, se actualiza en un solo lugar
- DRY (Don't Repeat Yourself)

### **4. Responsive Design con Tailwind**

```html
<div class="px-4 sm:px-6 lg:px-8">
    <h1 class="text-xl sm:text-2xl lg:text-3xl">Título</h1>
</div>
```

**Decisión:** Mobile-first con breakpoints
**Razón:**
- `px-4` = padding móvil (más pequeño)
- `sm:px-6` = padding tablet (mediano)
- `lg:px-8` = padding desktop (grande)
- La mayoría de usuarios usan móvil primero

---

## 🔐 SEGURIDAD (¿Cómo protegemos la aplicación?)

### **1. Middleware de Autenticación**

```php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
```

**Decisión:** Middleware `auth` y `verified`
**Razón:**
- `auth`: Solo usuarios autenticados acceden
- `verified`: Email debe estar verificado
- Laravel redirige automáticamente al login si no cumple

### **2. Verificación de Ownership**

```php
public function update(Request $request, CreatorLink $link)
{
    // Verificar que el link pertenece al usuario
    if ($link->creatorProfile->user_id !== auth()->id()) {
        abort(403, 'No autorizado');
    }
    
    $link->update($validated);
}
```

**Decisión:** Verificación manual antes de editar/eliminar
**Razón:**
- Evita que Usuario A edite los links de Usuario B
- Aunque la URL sea `/links/123`, verifica que 123 sea tuyo
- `abort(403)` = HTTP Forbidden

### **3. Mass Assignment Protection**

```php
class CreatorProfile extends Model
{
    protected $fillable = [
        'user_id',
        'slug',
        'display_name',
        'bio',
        'avatar_url',
    ];
}
```

**Decisión:** Usar `$fillable` en todos los modelos
**Razón:**
- Solo estos campos pueden asignarse con `create()` o `update()`
- Evita que alguien envíe `is_admin=1` en el request
- Protección contra ataques de asignación masiva

### **4. Validación en el Backend**

```php
$validated = $request->validate([
    'title' => 'required|string|max:255',
    'url' => 'required|url|max:500',
], [
    'url.url' => 'Debe ser una URL válida (incluye http:// o https://)',
]);
```

**Decisión:** NUNCA confiar en validación del frontend
**Razón:**
- Alguien puede desactivar JavaScript
- Pueden enviar requests con Postman/curl
- El backend SIEMPRE debe validar

---

## 🎯 FUNCIONALIDADES PRINCIPALES

### **1. Drag & Drop para Reordenar Links**

#### Backend: CreatorLinkController.php

```php
public function reorder(Request $request)
{
    $validated = $request->validate([
        'links' => 'required|array',
        'links.*.id' => 'required|exists:creator_links,id',
        'links.*.order' => 'required|integer|min:0',
    ]);
    
    $profile = auth()->user()->creatorProfile;
    
    foreach ($validated['links'] as $linkData) {
        $link = CreatorLink::find($linkData['id']);
        
        // Verificar ownership
        if ($link && $link->creator_profile_id === $profile->id) {
            $link->order = $linkData['order'];
            $link->save();
        }
    }
    
    return back();
}
```

**¿Por qué este enfoque?**
- Recibe array completo con nuevo orden
- Actualiza en batch (eficiente)
- Verifica que cada link pertenezca al usuario

#### Frontend: Dashboard.vue

```javascript
// Estado reactivo
const sortableLinks = ref([...props.links]);
const draggedItem = ref(null);

// Desktop: HTML5 Drag API
const onDragStart = (index) => {
    draggedItem.value = index;
};

const onDragOver = (event, index) => {
    event.preventDefault();
    // Intercambiar posiciones en el array
    const items = [...sortableLinks.value];
    const draggedItemContent = items[draggedItem.value];
    items.splice(draggedItem.value, 1);
    items.splice(index, 0, draggedItemContent);
    sortableLinks.value = items;
    draggedItem.value = index;
};

// Móvil: Touch Events
const onTouchMove = (event, index) => {
    event.preventDefault();
    const touch = event.touches[0];
    const deltaY = touch.clientY - touchStartY.value;
    
    // Si se movió más de 50px, intercambiar
    if (Math.abs(deltaY) > 50) {
        // Lógica de intercambio
    }
};
```

**¿Por qué dos implementaciones (drag y touch)?**
- **Desktop:** HTML5 Drag API (estándar del navegador)
- **Móvil:** Touch Events porque drag no funciona en touch
- **50px threshold:** Evita cambios accidentales al scroll

**¿Por qué `event.preventDefault()` en touch?**
- Sin esto, el navegador intenta hacer scroll
- Previene comportamiento por defecto durante drag

### **2. Modal de Apoyo en Página Pública**

```vue
<script setup>
const showModal = ref(false);
const supportForm = useForm({
    supporter_name: '',
    supporter_email: '',
    amount: '',
    message: '',
});

const submitSupport = () => {
    supportForm.post(route('support.store', props.profile.slug), {
        onSuccess: () => {
            supportForm.reset();
            showModal.value = false;
        },
    });
};
</script>

<template>
    <!-- Modal overlay -->
    <div v-if="showModal" 
         @click.self="showModal = false"
         class="fixed inset-0 bg-black/50">
        
        <!-- Modal content -->
        <div class="modal-content">
            <form @submit.prevent="submitSupport">
                <!-- Campos del formulario -->
            </form>
        </div>
    </div>
</template>
```

**Decisiones clave:**

1. **`@click.self="closeModal"`**
   - **Razón:** Solo cierra si haces clic en el fondo
   - Si haces clic dentro del modal, no se cierra
   - `.self` = solo el elemento mismo, no sus hijos

2. **`useForm` de Inertia**
   - **Razón:** Maneja automáticamente:
     - Estado del formulario
     - Errores de validación
     - Estado `processing` (botón deshabilitado)
     - Reset después de éxito

3. **`onSuccess: () => reset()`**
   - **Razón:** Limpia el formulario después de enviar
   - Cierra el modal
   - Evita que se vuelva a enviar al actualizar

---

## 🚀 OPTIMIZACIONES REALIZADAS

### **1. Eliminación de Código No Usado**

**Antes:**
- 779 módulos
- 20 archivos compilados
- Build time: ~18 segundos

**Después de limpieza:**
- 767 módulos (-12)
- 13 archivos compilados (-7)
- Build time: ~6 segundos (-65%)

**Archivos eliminados:**
```
❌ ApplicationLogo.vue     (reemplazado por texto)
❌ Checkbox.vue            (HTML nativo)
❌ DangerButton.vue        (no usado)
❌ InputLabel.vue          (HTML nativo)
❌ Modal.vue               (custom modal en Creator)
❌ PrimaryButton.vue       (estilos inline)
❌ TextInput.vue           (HTML nativo)
```

**¿Por qué eliminar en lugar de dejar?**
- Menos código = builds más rápidos
- Menos archivos JS enviados al navegador
- Más fácil de mantener (menos lugares donde buscar)

### **2. Lazy Loading de Rutas (Automático con Vite)**

```javascript
// Vite importa componentes on-demand
const Dashboard = () => import('./Pages/Dashboard.vue')
```

**Razón:**
- No carga Dashboard.vue hasta que visitas /dashboard
- Archivo inicial más pequeño
- Mejor performance percibida

---

## 🎨 DECISIONES DE UX/UI

### **1. Logo Movido hacia Arriba**

```html
<h1 class="relative -top-5">TipSee</h1>
```

**Razón:**
- Más espacio visual en la parte superior
- Da sensación de "elevación" y modernidad
- Separa visualmente del subtítulo

### **2. Emojis en Lugar de Iconos**

```html
<h3>📊 Estadísticas</h3>
<h3>🔗 Mis Links</h3>
<h3>💝 Apoyos Recibidos</h3>
```

**Decisión:** Emojis en lugar de iconos SVG o Font Awesome
**Razón:**
- No requiere biblioteca externa (0 KB adicionales)
- Funcionan en todos los navegadores
- Rápido de implementar
- Universalmente entendibles
- Añaden personalidad

### **3. Botones con Transformaciones Hover**

```css
hover:scale-105 transition duration-200
```

**Razón:**
- Feedback visual inmediato
- Sensación de "clickeable"
- `duration-200` = transición suave (0.2s)
- Mejora UX sin JavaScript

---

## 🧪 TESTING (Preparado para)

### Estructura preparada para tests:

```php
tests/
├── Feature/
│   ├── DashboardTest.php
│   ├── CreatorLinkTest.php
│   └── SupportTest.php
└── Unit/
    └── CreatorProfileTest.php
```

**Ejemplo de test:**
```php
public function test_user_can_create_link()
{
    $user = User::factory()->create();
    $profile = CreatorProfile::factory()->create(['user_id' => $user->id]);
    
    $response = $this->actingAs($user)->post('/links', [
        'title' => 'Mi YouTube',
        'url' => 'https://youtube.com',
    ]);
    
    $response->assertRedirect();
    $this->assertDatabaseHas('creator_links', [
        'title' => 'Mi YouTube',
        'creator_profile_id' => $profile->id,
    ]);
}
```

---

## 📝 RESUMEN DE DECISIONES CLAVE

| Decisión | Razón | Beneficio |
|----------|-------|-----------|
| Laravel + Inertia | SPA sin API REST | Menos código, más simple |
| Vue 3 Composition API | Código moderno | Mejor reutilización |
| Tailwind CSS | Clases utilitarias | Diseño rápido y consistente |
| Controladores separados | Single Responsibility | Mantenibilidad |
| Modelos relacionados | Normalización BD | Integridad de datos |
| Touch + Drag events | Mobile + Desktop | UX en todos dispositivos |
| Componentes pequeños | Reutilización | DRY principle |
| Middleware auth | Seguridad | Protección automática |
| Validación backend | No confiar en frontend | Seguridad real |
| Google Fonts | CDN externo | Carga rápida |

---

## 🔮 SIGUIENTE NIVEL (Escalabilidad futura)

Si el proyecto crece, considera:

1. **Caching:** Redis para dashboard stats
2. **Queue Jobs:** Procesar pagos en background
3. **API REST:** Para app móvil nativa
4. **Tests Automatizados:** PHPUnit + Pest
5. **CI/CD:** GitHub Actions para deploys
6. **CDN:** Para avatares e imágenes
7. **Policies:** En lugar de verificación manual
8. **Service Layer:** Para lógica compleja

---

## 📖 GLOSARIO

- **MVC:** Model-View-Controller (patrón de diseño)
- **SPA:** Single Page Application (sin recargas)
- **ORM:** Object-Relational Mapping (Eloquent)
- **CRUD:** Create, Read, Update, Delete
- **Mass Assignment:** Asignación masiva de datos
- **Middleware:** Filtros que se ejecutan antes de la ruta
- **Props:** Propiedades pasadas a componentes Vue
- **Refs:** Variables reactivas en Vue
- **Composable:** Función reutilizable en Vue 3

---

**Autor:** Proyecto TipSee  
**Fecha:** Noviembre 2025  
**Versión:** 1.0
