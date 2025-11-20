<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Confirmar Contraseña - TipSee" />
    
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4">
        <div class="w-full max-w-md">
            <!-- Logo/Título -->
            <div class="text-center mb-8">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-white mb-2" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                </Link>
                <p class="text-white/90 text-lg">Confirma tu contraseña</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div class="mb-6 text-sm text-gray-600 bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-400">
                    🔒 Esta es un área segura de la aplicación. Por favor confirma tu contraseña antes de continuar.
                </div>

                <form @submit.prevent="submit" class="space-y-6">
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
                            autofocus
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Ingresa tu contraseña"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span v-if="!form.processing">Confirmar</span>
                        <span v-else>Confirmando...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
