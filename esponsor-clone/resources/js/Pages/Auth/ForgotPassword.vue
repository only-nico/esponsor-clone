<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Recuperar Contraseña - TipSee" />
    
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4">
        <div class="w-full max-w-md">
            <!-- Logo/Título -->
            <div class="text-center mb-8">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-white mb-2" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                </Link>
                <p class="text-white/90 text-lg">Recupera tu contraseña</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div class="mb-6 text-sm text-gray-600 bg-indigo-50 p-4 rounded-lg">
                    ¿Olvidaste tu contraseña? No hay problema. Ingresa tu email y te enviaremos un enlace para restablecer tu contraseña.
                </div>

                <div
                    v-if="status"
                    class="mb-4 text-sm font-medium text-green-600 bg-green-50 p-3 rounded-lg"
                >
                    {{ status }}
                </div>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="tu@email.com"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span v-if="!form.processing">Enviar Enlace de Recuperación</span>
                        <span v-else>Enviando...</span>
                    </button>

                    <!-- Back to Login -->
                    <div class="text-center pt-4 border-t border-gray-200">
                        <Link
                            :href="route('login')"
                            class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold"
                        >
                            ← Volver al inicio de sesión
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
