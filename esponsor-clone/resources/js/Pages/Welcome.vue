<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="TipSee - Recibe apoyo de tu comunidad" />
    
    <!-- Pantalla principal con diseño limpio y centrado -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600">
        <div class="text-center px-6">
            <!-- Logo / Nombre de la plataforma -->
            <div class="mb-12">
                <h1 class="text-7xl md:text-8xl font-bold text-white mb-4 tracking-tight relative -top-5" style="font-family: 'Pacifico', cursive;">
                    TipSee
                </h1>
                <p class="text-xl md:text-2xl text-white/90 font-light">
                    Recibe apoyo de tu comunidad
                </p>
            </div>

            <!-- Botones de acción -->
            <div v-if="canLogin" class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <!-- Si el usuario ya está autenticado, mostrar Dashboard -->
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="w-full sm:w-auto px-8 py-4 bg-white text-indigo-600 font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200"
                >
                    Ir al Dashboard
                </Link>

                <!-- Si no está autenticado, mostrar Login y Register -->
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="w-full sm:w-auto px-8 py-4 bg-white text-indigo-600 font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-200"
                    >
                        Iniciar Sesión
                    </Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="w-full sm:w-auto px-8 py-4 bg-transparent text-white font-semibold rounded-full border-2 border-white hover:bg-white hover:text-indigo-600 transform hover:scale-105 transition duration-200"
                    >
                        Registrarse
                    </Link>
                </template>
            </div>
        </div>
    </div>
</template>
