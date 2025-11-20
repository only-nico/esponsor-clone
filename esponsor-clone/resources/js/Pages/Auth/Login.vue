<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Iniciar Sesión - TipSee" />
    
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4">
        <div class="w-full max-w-md">
            <!-- Logo/Título -->
            <div class="text-center mb-8">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-white mb-2" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                </Link>
                <p class="text-white/90 text-lg">Inicia sesión en tu cuenta</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div v-if="status" class="mb-4 text-sm font-medium text-green-600 bg-green-50 p-3 rounded-lg">
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

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Contraseña
                        </label>
                        <input
                            id="password"
                            type="password"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="••••••••"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input
                                type="checkbox"
                                name="remember"
                                v-model="form.remember"
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            />
                            <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-sm text-indigo-600 hover:text-indigo-800 font-medium"
                        >
                            ¿Olvidaste tu contraseña?
                        </Link>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span v-if="!form.processing">Iniciar Sesión</span>
                        <span v-else>Iniciando...</span>
                    </button>

                    <!-- Register Link -->
                    <div class="text-center pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            ¿No tienes cuenta?
                            <Link
                                :href="route('register')"
                                class="text-indigo-600 hover:text-indigo-800 font-semibold"
                            >
                                Regístrate aquí
                            </Link>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
