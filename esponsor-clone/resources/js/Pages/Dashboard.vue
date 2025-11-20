<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router } from '@inertiajs/vue3';
import { ref } from 'vue';

// Props recibidas del controlador
const props = defineProps({
    profile: Object,
    links: Array,
    supports: Object,
    stats: Object,
});

// Links ordenables localmente
const sortableLinks = ref([...props.links]);

// Formulario del perfil
const profileForm = useForm({
    display_name: props.profile?.display_name || '',
    slug: props.profile?.slug || '',
    bio: props.profile?.bio || '',
    avatar_url: props.profile?.avatar_url || '',
});

// Formulario de links
const linkForm = useForm({
    title: '',
    url: '',
    order: 0,
});

// Estado para drag & drop
const draggedItem = ref(null);
const touchStartY = ref(0);
const touchCurrentY = ref(0);
const isTouching = ref(false);

// Guardar perfil
const saveProfile = () => {
    profileForm.put(route('creator.profile.update'), {
        preserveScroll: true,
        onSuccess: () => {
            // Perfil guardado
        },
    });
};

// Agregar link
const addLink = () => {
    linkForm.post(route('links.store'), {
        preserveScroll: true,
        onSuccess: () => {
            linkForm.reset();
            sortableLinks.value = [...props.links];
        },
    });
};

// Eliminar link
const deleteLink = (linkId) => {
    if (confirm('¿Estás seguro de eliminar este link?')) {
        router.delete(route('links.destroy', linkId), {
            preserveScroll: true,
            onSuccess: () => {
                sortableLinks.value = sortableLinks.value.filter(l => l.id !== linkId);
            },
        });
    }
};

// Funciones de drag & drop
const onDragStart = (index) => {
    draggedItem.value = index;
};

const onDragOver = (event, index) => {
    event.preventDefault();
    if (draggedItem.value === null || draggedItem.value === index) return;
    
    const items = [...sortableLinks.value];
    const draggedItemContent = items[draggedItem.value];
    items.splice(draggedItem.value, 1);
    items.splice(index, 0, draggedItemContent);
    
    sortableLinks.value = items;
    draggedItem.value = index;
};

const onDragEnd = () => {
    // Actualizar el orden en el servidor
    const orderData = sortableLinks.value.map((link, index) => ({
        id: link.id,
        order: index,
    }));
    
    router.post(route('links.reorder'), {
        links: orderData,
    }, {
        preserveScroll: true,
    });
    
    draggedItem.value = null;
};

// Funciones de touch para móvil
const onTouchStart = (event, index) => {
    const touch = event.touches[0];
    touchStartY.value = touch.clientY;
    touchCurrentY.value = touch.clientY;
    draggedItem.value = index;
    isTouching.value = true;
};

const onTouchMove = (event, index) => {
    if (!isTouching.value || draggedItem.value === null) return;
    
    event.preventDefault();
    const touch = event.touches[0];
    touchCurrentY.value = touch.clientY;
    
    const deltaY = touch.clientY - touchStartY.value;
    
    // Si se movió más de 50px, intercambiar posiciones
    if (Math.abs(deltaY) > 50) {
        if (deltaY > 0 && index < sortableLinks.value.length - 1) {
            // Mover hacia abajo
            const items = [...sortableLinks.value];
            const temp = items[index];
            items[index] = items[index + 1];
            items[index + 1] = temp;
            sortableLinks.value = items;
            draggedItem.value = index + 1;
            touchStartY.value = touch.clientY;
        } else if (deltaY < 0 && index > 0) {
            // Mover hacia arriba
            const items = [...sortableLinks.value];
            const temp = items[index];
            items[index] = items[index - 1];
            items[index - 1] = temp;
            sortableLinks.value = items;
            draggedItem.value = index - 1;
            touchStartY.value = touch.clientY;
        }
    }
};

const onTouchEnd = () => {
    if (!isTouching.value) return;
    
    // Actualizar el orden en el servidor
    const orderData = sortableLinks.value.map((link, index) => ({
        id: link.id,
        order: index,
    }));
    
    router.post(route('links.reorder'), {
        links: orderData,
    }, {
        preserveScroll: true,
    });
    
    draggedItem.value = null;
    isTouching.value = false;
    touchStartY.value = 0;
    touchCurrentY.value = 0;
};

// Copiar URL pública
const copyPublicUrl = () => {
    if (props.profile?.public_url) {
        navigator.clipboard.writeText(window.location.origin + '/@' + props.profile.slug);
        alert('¡URL copiada al portapapeles!');
    }
};
</script>

<template>
    <Head title="Dashboard - TipSee" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                    🎨 Dashboard
                </h2>
            </div>
        </template>

        <div class="py-4 sm:py-8 bg-gradient-to-br from-purple-50 via-indigo-50 to-blue-50 min-h-screen">
            <div class="mx-auto max-w-7xl space-y-4 sm:space-y-6 px-4 sm:px-6 lg:px-8">
                
                <!-- Estadísticas -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 overflow-hidden shadow-lg rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white transform hover:scale-105 transition duration-200">
                        <div class="text-purple-100 text-xs sm:text-sm font-medium mb-1 sm:mb-2">💰 Total Apoyos</div>
                        <div class="text-3xl sm:text-4xl font-bold">{{ stats.total_supports }}</div>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-emerald-600 overflow-hidden shadow-lg rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white transform hover:scale-105 transition duration-200">
                        <div class="text-green-100 text-xs sm:text-sm font-medium mb-1 sm:mb-2">💵 Monto Total</div>
                        <div class="text-3xl sm:text-4xl font-bold">${{ stats.total_amount }}</div>
                    </div>
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 overflow-hidden shadow-lg rounded-xl sm:rounded-2xl p-4 sm:p-6 text-white transform hover:scale-105 transition duration-200">
                        <div class="text-blue-100 text-xs sm:text-sm font-medium mb-1 sm:mb-2">🔗 Links Activos</div>
                        <div class="text-3xl sm:text-4xl font-bold">{{ stats.total_links }}</div>
                    </div>
                </div>

                <!-- Perfil del Creador -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl sm:rounded-2xl border-2 border-purple-100">
                    <div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-3 sm:p-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                            <span>👤</span> <span class="hidden sm:inline">Tu Perfil de Creador</span><span class="sm:hidden">Perfil</span>
                        </h3>
                    </div>
                    <div class="p-4 sm:p-6">
                        <form @submit.prevent="saveProfile" class="space-y-4 sm:space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nombre Público</label>
                                <input 
                                    v-model="profileForm.display_name" 
                                    type="text" 
                                    class="block w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                                    placeholder="Tu nombre de creador"
                                    required
                                />
                                <div v-if="profileForm.errors.display_name" class="text-red-600 text-sm mt-1">
                                    {{ profileForm.errors.display_name }}
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Slug (URL única)</label>
                                <div class="mt-1 flex rounded-lg shadow-sm">
                                    <span class="inline-flex items-center px-4 rounded-l-lg border-2 border-r-0 border-gray-200 bg-gradient-to-r from-purple-50 to-indigo-50 text-purple-700 text-sm font-semibold">
                                        @
                                    </span>
                                    <input 
                                        v-model="profileForm.slug" 
                                        type="text" 
                                        class="flex-1 block w-full px-4 py-3 rounded-r-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                                        placeholder="tu-nombre"
                                        required
                                    />
                                </div>
                                <div v-if="profileForm.errors.slug" class="text-red-600 text-sm mt-1">
                                    {{ profileForm.errors.slug }}
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Tu página será: <span class="font-semibold text-purple-600">/@{{ profileForm.slug || 'tu-nombre' }}</span></p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Biografía</label>
                                <textarea 
                                    v-model="profileForm.bio" 
                                    rows="3"
                                    class="block w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                                    placeholder="Cuéntale a tu audiencia sobre ti..."
                                ></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">URL del Avatar</label>
                                <input 
                                    v-model="profileForm.avatar_url" 
                                    type="url" 
                                    class="block w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                                    placeholder="https://tu-imagen.com/avatar.jpg"
                                />
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                                <button 
                                    type="submit" 
                                    class="w-full sm:w-auto px-4 sm:px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-purple-700 hover:to-indigo-700 transform hover:scale-105 transition duration-200 disabled:opacity-50 shadow-lg text-sm sm:text-base"
                                    :disabled="profileForm.processing"
                                >
                                    {{ profileForm.processing ? '💾 Guardando...' : '💾 Guardar' }}
                                </button>

                                <button 
                                    v-if="profile"
                                    type="button"
                                    @click="copyPublicUrl"
                                    class="w-full sm:w-auto px-4 sm:px-6 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-semibold rounded-lg hover:from-gray-700 hover:to-gray-800 transform hover:scale-105 transition duration-200 shadow-lg text-sm sm:text-base"
                                >
                                    📋 Copiar URL
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Gestión de Links -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl sm:rounded-2xl border-2 border-indigo-100">
                    <div class="bg-gradient-to-r from-indigo-600 to-blue-600 p-3 sm:p-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                            <span>🔗</span> <span class="hidden sm:inline">Mis Enlaces</span><span class="sm:hidden">Enlaces</span>
                        </h3>
                    </div>
                    <div class="p-4 sm:p-6">
                        <!-- Formulario para agregar link -->
                        <form @submit.prevent="addLink" class="mb-4 sm:mb-6 space-y-3 bg-gradient-to-r from-indigo-50 to-blue-50 p-3 sm:p-4 rounded-lg sm:rounded-xl border-2 border-indigo-100">
                            <div class="grid grid-cols-1 gap-3">
                                <div>
                                    <input 
                                        v-model="linkForm.title" 
                                        type="text" 
                                        placeholder="✨ Título del link"
                                        class="block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition text-sm sm:text-base"
                                        required
                                    />
                                </div>
                                <div>
                                    <input 
                                        v-model="linkForm.url" 
                                        type="url" 
                                        placeholder="🌐 https://..."
                                        class="block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border-2 border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition text-sm sm:text-base"
                                        required
                                    />
                                </div>
                            </div>
                            <button 
                                type="submit" 
                                class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-lg hover:from-green-700 hover:to-emerald-700 transform hover:scale-105 transition duration-200 disabled:opacity-50 shadow-lg text-sm sm:text-base"
                                :disabled="linkForm.processing"
                            >
                                ➕ Agregar Link
                            </button>
                        </form>

                        <!-- Lista de links -->
                        <div v-if="sortableLinks && sortableLinks.length > 0" class="space-y-2 sm:space-y-3">
                            <div class="text-xs sm:text-sm text-gray-600 mb-3 flex items-center gap-2">
                                <span>🔄</span> <span class="hidden sm:inline">Arrastra para reordenar</span><span class="sm:hidden">Mantén presionado y desliza para reordenar</span>
                            </div>
                            <div 
                                v-for="(link, index) in sortableLinks" 
                                :key="link.id"
                                draggable="true"
                                @dragstart="onDragStart(index)"
                                @dragover="onDragOver($event, index)"
                                @dragend="onDragEnd"
                                @touchstart="onTouchStart($event, index)"
                                @touchmove="onTouchMove($event, index)"
                                @touchend="onTouchEnd"
                                class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-3 sm:p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg sm:rounded-xl border-2 border-gray-200 hover:border-indigo-300 transition gap-3 sm:gap-0 cursor-move select-none"
                                :class="{ 'opacity-50 scale-105': draggedItem === index || (isTouching && draggedItem === index) }"
                            >
                                <div class="flex items-center gap-3 flex-1 w-full sm:w-auto">
                                    <div class="text-gray-400 cursor-grab active:cursor-grabbing">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M7 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 2zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 14zm6-8a2 2 0 1 0-.001-4.001A2 2 0 0 0 13 6zm0 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 14z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-900 text-sm sm:text-base">{{ link.title }}</div>
                                        <div class="text-xs sm:text-sm text-gray-600 truncate">{{ link.url }}</div>
                                    </div>
                                </div>
                                <button 
                                    @click="deleteLink(link.id)"
                                    class="w-full sm:w-auto px-3 sm:px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-lg hover:from-red-700 hover:to-red-800 transform hover:scale-105 transition text-xs sm:text-sm shadow"
                                >
                                    🗑️ Eliminar
                                </button>
                            </div>
                        </div>
                        <div v-else class="text-gray-500 text-center py-6 sm:py-8 bg-gray-50 rounded-lg sm:rounded-xl border-2 border-dashed border-gray-300">
                            <div class="text-3xl sm:text-4xl mb-2">🔗</div>
                            <div class="text-sm sm:text-base px-4">No tienes links aún. ¡Agrega tu primer link arriba!</div>
                        </div>
                    </div>
                </div>

                <!-- Apoyos Recibidos -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl sm:rounded-2xl border-2 border-green-100">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-3 sm:p-4">
                        <h3 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                            <span>💝</span> <span class="hidden sm:inline">Apoyos Recibidos</span><span class="sm:hidden">Apoyos</span>
                        </h3>
                    </div>
                    <div class="p-4 sm:p-6">
                        <div v-if="supports && supports.data && supports.data.length > 0" class="space-y-3 sm:space-y-4">
                            <div 
                                v-for="support in supports.data" 
                                :key="support.id"
                                class="border-l-4 border-green-500 bg-gradient-to-r from-green-50 to-emerald-50 p-4 sm:p-5 rounded-lg sm:rounded-xl shadow-sm hover:shadow-md transition"
                            >
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-start mb-2 sm:mb-3 gap-2">
                                    <div class="font-bold text-gray-900 text-base sm:text-lg">💚 {{ support.supporter_name }}</div>
                                    <div class="text-xl sm:text-2xl font-bold text-green-600">${{ support.amount }}</div>
                                </div>
                                <div class="text-gray-700 mb-2 sm:mb-3 italic text-sm sm:text-base">"{{ support.message }}"</div>
                                <div class="text-xs sm:text-sm text-gray-500 flex items-center gap-1">
                                    <span>🕐</span>
                                    {{ new Date(support.created_at).toLocaleDateString('es-ES', { 
                                        year: 'numeric', 
                                        month: 'long', 
                                        day: 'numeric',
                                        hour: '2-digit',
                                        minute: '2-digit'
                                    }) }}
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-gray-500 text-center py-8 sm:py-12 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg sm:rounded-xl border-2 border-dashed border-gray-300">
                            <div class="text-5xl sm:text-6xl mb-3 sm:mb-4">🚀</div>
                            <div class="text-base sm:text-lg font-semibold mb-2 px-4">¡Aún no has recibido apoyos!</div>
                            <div class="text-xs sm:text-sm px-4">Comparte tu página pública para empezar a recibir apoyo de tu comunidad</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
