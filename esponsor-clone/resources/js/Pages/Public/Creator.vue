<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

// Props recibidas del controlador
const props = defineProps({
    creator: Object,
    recentSupports: Array,
});

// Estado del modal
const showModal = ref(false);

// Formulario de apoyo
const supportForm = useForm({
    supporter_name: '',
    message: '',
    amount: 5,
});

// Abrir modal
const openSupportModal = () => {
    showModal.value = true;
};

// Cerrar modal
const closeModal = () => {
    showModal.value = false;
    supportForm.reset();
};

// Enviar apoyo
const sendSupport = () => {
    supportForm.post(route('support.store', props.creator.slug), {
        onSuccess: () => {
            closeModal();
            alert('¡Gracias por tu apoyo! 💖');
        },
    });
};
</script>

<template>
    <Head :title="creator.display_name" />

    <div class="min-h-screen bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600">
        <!-- Header -->
        <div class="bg-white/10 backdrop-blur-sm shadow-lg">
            <div class="mx-auto max-w-4xl px-4 py-3 sm:py-4">
                <div class="text-center">
                    <a href="/" class="inline-block">
                        <h1 class="text-2xl sm:text-3xl font-bold text-white" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="mx-auto max-w-4xl px-4 py-6 sm:py-12">
            
            <!-- Perfil del Creador -->
            <div class="text-center mb-6 sm:mb-12 bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-2xl">
                <!-- Avatar -->
                <div class="mb-4 sm:mb-6">
                    <img 
                        v-if="creator.avatar_url" 
                        :src="creator.avatar_url" 
                        :alt="creator.display_name"
                        class="w-24 h-24 sm:w-32 sm:h-32 rounded-full mx-auto object-cover border-4 border-purple-500 shadow-lg"
                    />
                    <div 
                        v-else
                        class="w-24 h-24 sm:w-32 sm:h-32 rounded-full mx-auto bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center text-white text-4xl sm:text-5xl font-bold shadow-lg"
                    >
                        {{ creator.display_name.charAt(0).toUpperCase() }}
                    </div>
                </div>

                <!-- Nombre -->
                <h2 class="text-2xl sm:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600 mb-1 sm:mb-2">
                    {{ creator.display_name }}
                </h2>
                
                <!-- Slug -->
                <p class="text-base sm:text-lg text-indigo-600 font-semibold mb-3 sm:mb-4">@{{ creator.slug }}</p>

                <!-- Bio -->
                <p v-if="creator.bio" class="text-gray-700 text-sm sm:text-lg max-w-2xl mx-auto mb-6 sm:mb-8 px-2">
                    {{ creator.bio }}
                </p>

                <!-- Botón de Apoyo -->
                <button 
                    @click="openSupportModal"
                    class="w-full sm:w-auto px-8 sm:px-10 py-3 sm:py-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-full hover:from-purple-700 hover:to-indigo-700 transform hover:scale-105 transition-all shadow-xl text-base sm:text-lg"
                >
                    💝 Apoyar a {{ creator.display_name }}
                </button>
            </div>

            <!-- Links del Creador -->
            <div v-if="creator.links && creator.links.length > 0" class="space-y-3 sm:space-y-4 mb-6 sm:mb-12">
                <a 
                    v-for="link in creator.links" 
                    :key="link.id"
                    :href="link.url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="block w-full p-4 sm:p-5 bg-white rounded-xl sm:rounded-2xl border-2 border-transparent hover:border-purple-500 hover:shadow-2xl transition-all text-center font-bold text-gray-900 hover:text-purple-600 transform hover:scale-105 text-sm sm:text-base"
                >
                    🔗 {{ link.title }}
                </a>
            </div>

            <!-- Apoyos Recientes -->
            <div v-if="recentSupports && recentSupports.length > 0" class="mt-6 sm:mt-12">
                <div class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 shadow-2xl">
                    <h3 class="text-2xl sm:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600 mb-4 sm:mb-6 text-center">
                        💖 Apoyos Recientes
                    </h3>
                    <div class="space-y-3 sm:space-y-4">
                    <div 
                        v-for="support in recentSupports" 
                        :key="support.id"
                        class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-md border-l-4 border-purple-500 hover:shadow-lg transition"
                    >
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-start mb-2 gap-2">
                            <div class="font-bold text-gray-900 text-base sm:text-lg">💚 {{ support.supporter_name }}</div>
                            <div class="text-xl sm:text-2xl font-bold text-green-600">${{ support.amount }}</div>
                        </div>
                        <div class="text-gray-700 italic text-sm sm:text-base">"{{ support.message }}"</div>
                    </div>
                </div>
                </div>
            </div>

        </div>

        <!-- Modal de Apoyo -->
        <div 
            v-if="showModal"
            class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 z-50"
            @click.self="closeModal"
        >
            <div class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 max-w-md w-full shadow-2xl transform transition-all max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center mb-4 sm:mb-6">
                    <h3 class="text-xl sm:text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                        Apoyar a {{ creator.display_name }}
                    </h3>
                    <button 
                        @click="closeModal"
                        class="text-gray-400 hover:text-gray-600 text-2xl sm:text-3xl leading-none font-bold"
                    >
                        ×
                    </button>
                </div>

                <form @submit.prevent="sendSupport" class="space-y-4 sm:space-y-5">
                    <!-- Nombre -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tu Nombre
                        </label>
                        <input 
                            v-model="supportForm.supporter_name" 
                            type="text" 
                            class="block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition text-sm sm:text-base"
                            placeholder="Juan Pérez"
                            required
                        />
                        <div v-if="supportForm.errors.supporter_name" class="text-red-600 text-sm mt-1">
                            {{ supportForm.errors.supporter_name }}
                        </div>
                    </div>

                    <!-- Mensaje -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Mensaje
                        </label>
                        <textarea 
                            v-model="supportForm.message" 
                            rows="4"
                            class="block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition text-sm sm:text-base"
                            placeholder="Escribe un mensaje de apoyo..."
                            required
                        ></textarea>
                        <div v-if="supportForm.errors.message" class="text-red-600 text-sm mt-1">
                            {{ supportForm.errors.message }}
                        </div>
                    </div>

                    <!-- Monto -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Monto (simbólico)
                        </label>
                        <div class="flex items-center gap-2">
                            <span class="text-xl sm:text-2xl font-bold text-purple-600">$</span>
                            <input 
                                v-model.number="supportForm.amount" 
                                type="number" 
                                min="1"
                                max="100"
                                class="block w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg sm:rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition text-base sm:text-lg font-semibold"
                                required
                            />
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Entre $1 y $100</p>
                        <div v-if="supportForm.errors.amount" class="text-red-600 text-sm mt-1">
                            {{ supportForm.errors.amount }}
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2 sm:pt-4">
                        <button 
                            type="submit" 
                            class="w-full sm:flex-1 px-4 sm:px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold rounded-lg sm:rounded-xl hover:from-purple-700 hover:to-indigo-700 disabled:opacity-50 transform hover:scale-105 transition-all shadow-lg text-sm sm:text-base"
                            :disabled="supportForm.processing"
                        >
                            {{ supportForm.processing ? 'Enviando...' : '💖 Enviar Apoyo' }}
                        </button>
                        <button 
                            type="button"
                            @click="closeModal"
                            class="w-full sm:w-auto px-4 sm:px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-lg sm:rounded-xl hover:bg-gray-300 transition-all text-sm sm:text-base"
                        >
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-8 sm:mt-16 pb-6 sm:pb-8 text-center text-white px-4">
            <p class="text-base sm:text-lg font-semibold">Hecho con 💖 en <span class="font-bold">TipSee</span></p>
            <p class="text-xs sm:text-sm opacity-75 mt-2">Laravel + Vue + Inertia</p>
        </footer>
    </div>
</template>
