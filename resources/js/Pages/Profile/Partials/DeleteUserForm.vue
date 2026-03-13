<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.clearErrors();
    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <!-- Enhanced Header Section -->
        <header class="relative bg-gradient-to-r from-rose-50/80 via-red-50/50 to-rose-100/60 dark:from-rose-900/30 dark:via-red-900/20 dark:to-rose-950/30 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-rose-200/50 dark:border-rose-800/50">
            <div class="absolute inset-0 bg-gradient-to-br from-rose-500/5 to-transparent rounded-3xl"></div>
            <div class="relative flex items-start gap-6">
                <!-- Warning Icon -->
                <div class="flex-shrink-0 pt-1">
                    <div class="w-16 h-16 bg-gradient-to-r from-rose-500 to-red-600 rounded-2xl flex items-center justify-center shadow-xl border-4 border-white/20 backdrop-blur-sm">
                        <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="flex-1">
                    <h2 class="text-3xl font-black bg-gradient-to-r from-gray-900 via-rose-900 to-red-900 dark:from-white dark:via-rose-300 dark:to-red-300 bg-clip-text text-transparent tracking-tight mb-4">
                        ⚠️ Delete Account Permanently
                    </h2>
                    <div class="space-y-3">
                        <p class="text-lg text-gray-700 dark:text-gray-200 leading-relaxed font-medium">
                            This action is <span class="font-black text-rose-600 dark:text-rose-400">IRREVERSIBLE</span>.
                        </p>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                            Once confirmed, your entire account—including all employees, projects, clients, tasks, reports, and data—will be <strong class="text-rose-600 font-semibold">permanently deleted</strong>.
                        </p>
                        <div class="flex items-center gap-3 p-4 bg-rose-50/50 dark:bg-rose-900/30 rounded-2xl border border-rose-200/50 dark:border-rose-800/50">
                            <div class="w-2 h-2 bg-rose-400 rounded-full animate-pulse"></div>
                            <span class="text-sm font-semibold text-rose-700 dark:text-rose-300">Download your data first!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Enhanced Delete Button -->
        <div class="relative">
            <DangerButton 
                @click="confirmUserDeletion"
                class="group relative px-8 py-4 text-lg font-black rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden w-full sm:w-auto bg-gradient-to-r from-rose-500 via-red-600 to-rose-600 text-white border-2 border-rose-400/50 hover:border-rose-500/80 hover:from-rose-600 hover:via-red-700 hover:to-rose-700"
            >
                <div class="absolute inset-0 bg-white/10 group-hover:bg-white/20 backdrop-blur-sm transition-all duration-300"></div>
                <div class="relative flex items-center gap-3">
                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span>🗑️ Permanently Delete Account</span>
                </div>
            </DangerButton>
        </div>

        <!-- Enhanced Confirmation Modal -->
        <Modal :show="confirmingUserDeletion" @close="closeModal" class="max-w-2xl">
            <div class="p-8">
                <!-- Modal Header -->
                <div class="relative mb-8">
                    <div class="absolute -inset-2 bg-gradient-to-r from-rose-500/20 to-red-500/20 rounded-3xl blur-xl animate-pulse"></div>
                    <div class="relative bg-gradient-to-r from-rose-50/80 via-red-50/50 to-rose-100/60 dark:from-rose-900/40 dark:via-red-900/20 dark:to-rose-950/30 backdrop-blur-xl rounded-3xl p-8 border border-rose-200/50 dark:border-rose-800/50 shadow-2xl">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-gradient-to-r from-rose-500 to-red-600 rounded-2xl flex items-center justify-center shadow-2xl border-4 border-white/30 animate-pulse">
                                <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-black bg-gradient-to-r from-gray-900 via-rose-900 to-red-900 dark:from-white dark:via-rose-200 dark:to-red-200 bg-clip-text text-transparent tracking-tight">
                                    Final Confirmation Required
                                </h2>
                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200 mt-2">
                                    This action cannot be undone
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Warning Content -->
                <div class="space-y-6 mb-8">
                    <div class="bg-gradient-to-r from-yellow-50/80 to-amber-50/60 dark:from-yellow-900/20 dark:to-amber-900/10 backdrop-blur-xl rounded-2xl p-6 border-l-4 border-yellow-400 shadow-lg">
                        <div class="flex items-start gap-3">
                            <svg class="w-7 h-7 text-yellow-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <div>
                                <p class="font-bold text-lg text-gray-900 dark:text-white mb-2">What will be deleted:</p>
                                <ul class="text-sm space-y-1 text-gray-700 dark:text-gray-300">
                                    <li class="flex items-center gap-2">• All <strong>247 employees</strong> and their data</li>
                                    <li class="flex items-center gap-2">• All <strong>89 projects</strong> and files</li>
                                    <li class="flex items-center gap-2">• All <strong>clients</strong> and relationships</li>
                                    <li class="flex items-center gap-2">• All <strong>$156K revenue records</strong></li>
                                    <li class="flex items-center gap-2">• All <strong>reports & analytics</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="text-center py-8 px-6 bg-gradient-to-r from-blue-50/70 to-indigo-50/50 dark:from-blue-900/20 dark:to-indigo-900/10 rounded-2xl border-2 border-dashed border-blue-200/50 dark:border-blue-800/50">
                        <svg class="w-16 h-16 mx-auto mb-4 text-blue-500 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Enter your password to confirm</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Type your password carefully - this confirms you're authorized to delete everything</p>
                    </div>
                </div>

                <!-- Enhanced Password Input -->
                <div class="relative bg-white/60 dark:bg-zinc-800/50 backdrop-blur-xl rounded-2xl p-6 shadow-xl border-2 border-gray-200/50 dark:border-zinc-600/50 focus-within:border-rose-400 focus-within:shadow-rose-200/50 transition-all duration-300">
                    <InputLabel
                        for="password"
                        value="Your Account Password"
                        class="block text-sm font-bold text-gray-700 dark:text-gray-200 mb-3 tracking-wide uppercase"
                    />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <TextInput
                            id="password"
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="block w-full pl-12 pr-12 py-4 text-lg border-2 border-gray-200/50 dark:border-zinc-600/50 rounded-xl bg-white/50 dark:bg-zinc-900/30 backdrop-blur-sm shadow-inner focus:ring-4 focus:ring-rose-500/20 focus:border-rose-500 font-semibold placeholder-gray-400 transition-all duration-300"
                            placeholder="Enter your password to permanently delete account..."
                            @keyup.enter="deleteUser"
                        />
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                    </div>
                    <InputError :message="form.errors.password" class="mt-4 bg-rose-50/80 dark:bg-rose-900/40 border-l-4 border-rose-400 p-3 rounded-lg shadow-sm font-semibold" />
                </div>

                <!-- Enhanced Action Buttons -->
                <div class="mt-10 flex flex-col sm:flex-row gap-4 pt-8 border-t-2 border-gray-200/30 dark:border-zinc-700/50">
                    <SecondaryButton 
                        @click="closeModal"
                        class="flex-1 sm:flex-none px-8 py-4 text-lg font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 hover:scale-[1.01] transition-all duration-300 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-zinc-700 dark:to-zinc-600 text-gray-900 dark:text-white border border-gray-300/50 dark:border-zinc-500/50 hover:from-gray-200 hover:to-gray-300 dark:hover:from-zinc-600 dark:hover:to-zinc-500"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancel & Keep Account
                    </SecondaryButton>

                    <DangerButton
                        class="flex-1 sm:flex-none px-8 py-4 text-lg font-black rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 bg-gradient-to-r from-rose-500 via-red-600 to-rose-600 text-white border-2 border-rose-400/50 hover:border-rose-500/80 hover:from-rose-600 hover:via-red-700 hover:to-rose-700 flex items-center justify-center gap-3"
                        :class="{ 'opacity-25 cursor-not-allowed transform-none scale-100': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        <svg v-if="form.processing" class="w-6 h-6 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span v-else class="flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Permanently Delete Everything
                        </span>
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>

<style scoped>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-3px); }
}

.hover\:scale-\[1\.02\]:hover {
    transform: scale(1.02);
}
</style>
