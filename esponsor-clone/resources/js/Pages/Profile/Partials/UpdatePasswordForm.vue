<script setup>
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">🔒 Actualizar Contraseña</h2>

            <p class="mt-1 text-sm text-gray-600">
                Asegúrate de usar una contraseña larga y aleatoria para mantener tu cuenta segura.
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-700">Contraseña Actual</label>
                <input
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    autocomplete="current-password"
                    class="mt-1 block w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                />
                <InputError :message="form.errors.current_password" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                <input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                />
                <InputError :message="form.errors.password" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                />
                <InputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-purple-700 hover:to-indigo-700 transform hover:scale-105 transition duration-200 disabled:opacity-50 shadow-lg"
                >
                    💾 Guardar
                </button>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-green-600">✓ Guardado</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
