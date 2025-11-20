<script setup>
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Restablecer Contraseña - TipSee" />
    
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4 py-12">
        <div class="w-full max-w-md">
            <!-- Logo/Título -->
            <div class="text-center mb-8">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-white mb-2" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                </Link>
                <p class="text-white/90 text-lg">Restablece tu contraseña</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <form @submit.prevent="submit" class="space-y-5">
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
                            Nueva Contraseña
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
                            Confirmar Nueva Contraseña
                        </label>
                        <input
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Repite tu nueva contraseña"
                        />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed mt-6"
                    >
                        <span v-if="!form.processing">Restablecer Contraseña</span>
                        <span v-else>Restableciendo...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

