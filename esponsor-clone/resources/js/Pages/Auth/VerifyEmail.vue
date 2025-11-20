<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
    <Head title="Verificar Email - TipSee" />
    
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4">
        <div class="w-full max-w-md">
            <!-- Logo/Título -->
            <div class="text-center mb-8">
                <Link href="/" class="inline-block">
                    <h1 class="text-5xl font-bold text-white mb-2" style="font-family: 'Pacifico', cursive;">TipSee</h1>
                </Link>
                <p class="text-white/90 text-lg">Verifica tu email</p>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div class="mb-6 text-sm text-gray-600 bg-blue-50 p-4 rounded-lg border-l-4 border-blue-400">
                    📧 ¡Gracias por registrarte! Antes de comenzar, verifica tu dirección de email haciendo clic en el enlace que te enviamos. Si no recibiste el email, con gusto te enviaremos otro.
                </div>

                <div
                    v-if="verificationLinkSent"
                    class="mb-6 text-sm font-medium text-green-600 bg-green-50 p-4 rounded-lg border-l-4 border-green-400"
                >
                    ✅ Se ha enviado un nuevo enlace de verificación a tu dirección de email.
                </div>

                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Resend Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-indigo-700 transform hover:scale-[1.02] transition duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span v-if="!form.processing">Reenviar Email de Verificación</span>
                        <span v-else>Enviando...</span>
                    </button>

                    <!-- Logout Link -->
                    <div class="text-center pt-4 border-t border-gray-200">
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="text-sm text-red-600 hover:text-red-800 font-semibold"
                        >
                            Cerrar Sesión
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
