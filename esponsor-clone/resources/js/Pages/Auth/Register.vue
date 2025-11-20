<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Registrarse - TipSee" />
    
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo/Título -->
            <div class="text-center mb-8">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-white mb-2" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                </Link>
                <p class="text-white/90 text-lg">Crea tu cuenta</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <form @submit.prevent="submit" class="space-y-5">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nombre
                        </label>
                        <input
                            id="name"
                            type="text"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Tu nombre completo"
                        />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

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
                            autocomplete="new-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Mínimo 8 caracteres"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                            Confirmar Contraseña
                        </label>
                        <input
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Repite tu contraseña"
                        />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed mt-6"
                    >
                        <span v-if="!form.processing">Crear Cuenta</span>
                        <span v-else>Creando cuenta...</span>
                    </button>

                    <!-- Login Link -->
                    <div class="text-center pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            ¿Ya tienes cuenta?
                            <Link
                                :href="route('login')"
                                class="text-indigo-600 hover:text-indigo-800 font-semibold"
                            >
                                Inicia sesión
                            </Link>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
