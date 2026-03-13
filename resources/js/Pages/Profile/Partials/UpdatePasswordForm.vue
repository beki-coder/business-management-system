<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
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
    <section class="relative min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-zinc-900 dark:to-slate-900 py-12">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #FF2D20 0%, transparent 50%), radial-gradient(circle at 75% 75%, #3B82F6 0%, transparent 50%)"></div>
        </div>

        <div class="relative max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Header -->
            <header class="text-center mb-12">
                <div class="inline-flex items-center gap-3 bg-gradient-to-r from-[#FF2D20] to-red-500 text-white px-8 py-4 rounded-3xl shadow-2xl mb-8 backdrop-blur-xl border border-white/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 2c-2.761 0-5 2.239-5 5h10c0-2.761-2.239-5-5-5z"/>
                    </svg>
                    <div>
                        <h2 class="text-3xl font-black tracking-tight">Secure Your Account</h2>
                        <p class="text-white/90 text-sm font-medium mt-1">Update Password</p>
                    </div>
                </div>
                <p class="text-xl text-gray-600 dark:text-gray-300 font-medium leading-relaxed max-w-lg mx-auto">
                    🔐 Ensure your enterprise account uses a strong, random password to maximize security and protect your business data.
                </p>
            </header>

            <!-- Enhanced Form Card -->
            <div class="bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/40 dark:border-zinc-700/50 p-10">
                <form @submit.prevent="updatePassword" class="space-y-8">
                    
                    <!-- Current Password Field -->
                    <div class="group">
                        <div class="relative mb-4">
                            <InputLabel for="current_password" value="Current Password" class="text-lg font-bold text-gray-900 dark:text-white mb-3 tracking-wide uppercase bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="w-6 h-6 text-gray-400 group-focus-within:text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <TextInput
                                    id="current_password"
                                    ref="currentPasswordInput"
                                    v-model="form.current_password"
                                    type="password"
                                    class="block w-full pl-14 pr-12 py-5 text-lg border-2 border-gray-200/50 dark:border-zinc-600/50 rounded-2xl bg-white/50 dark:bg-zinc-900/30 backdrop-blur-sm shadow-inner focus:ring-4 focus:ring-[#FF2D20]/20 focus:border-[#FF2D20] font-semibold placeholder-gray-400 transition-all duration-300 group-focus-within:shadow-2xl"
                                    autocomplete="current-password"
                                    placeholder="Enter your current password..."
                                />
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <InputError
                            :message="form.errors.current_password"
                            class="bg-rose-50/80 dark:bg-rose-900/40 border-l-4 border-rose-400 p-4 rounded-xl shadow-sm font-semibold text-rose-800 dark:text-rose-200 ml-2 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300"
                        />
                    </div>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200/50 dark:border-zinc-700/50"></div>
                        </div>
                        <div class="relative flex justify-center text-xs uppercase">
                            <span class="bg-white/70 dark:bg-zinc-800/70 px-4 py-2 text-gray-500 font-semibold tracking-wider">New Password</span>
                        </div>
                    </div>

                    <!-- New Password Field -->
                    <div class="group">
                        <div class="relative mb-4">
                            <InputLabel for="password" value="New Password" class="text-lg font-bold text-gray-900 dark:text-white mb-3 tracking-wide uppercase bg-gradient-to-r from-[#FF2D20] to-red-600 bg-clip-text text-transparent" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="w-6 h-6 text-gray-400 group-focus-within:text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <TextInput
                                    id="password"
                                    ref="passwordInput"
                                    v-model="form.password"
                                    type="password"
                                    class="block w-full pl-14 pr-12 py-5 text-lg border-2 border-gray-200/50 dark:border-zinc-600/50 rounded-2xl bg-white/50 dark:bg-zinc-900/30 backdrop-blur-sm shadow-inner focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 font-semibold placeholder-gray-400 transition-all duration-300 group-focus-within:shadow-2xl"
                                    autocomplete="new-password"
                                    placeholder="Create a strong password (min 8 characters)..."
                                />
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <InputError :message="form.errors.password" class="bg-emerald-50/80 dark:bg-emerald-900/40 border-l-4 border-emerald-400 p-4 rounded-xl shadow-sm font-semibold text-emerald-800 dark:text-emerald-200 ml-2 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" />
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="group">
                        <div class="relative mb-6">
                            <InputLabel for="password_confirmation" value="Confirm New Password" class="text-lg font-bold text-gray-900 dark:text-white mb-3 tracking-wide uppercase bg-gradient-to-r from-emerald-500 to-teal-500 bg-clip-text text-transparent" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                                    <svg class="w-6 h-6 text-gray-400 group-focus-within:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <TextInput
                                    id="password_confirmation"
                                    v-model="form.password_confirmation"
                                    type="password"
                                    class="block w-full pl-14 pr-12 py-5 text-lg border-2 border-gray-200/50 dark:border-zinc-600/50 rounded-2xl bg-white/50 dark:bg-zinc-900/30 backdrop-blur-sm shadow-inner focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 font-semibold placeholder-gray-400 transition-all duration-300 group-focus-within:shadow-2xl"
                                    autocomplete="new-password"
                                    placeholder="Confirm your new password..."
                                />
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <InputError :message="form.errors.password_confirmation" class="bg-blue-50/80 dark:bg-blue-900/40 border-l-4 border-blue-400 p-4 rounded-xl shadow-sm font-semibold text-blue-800 dark:text-blue-200 ml-2 transform -translate-x-2 group-hover:translate-x-0 transition-all duration-300" />
                    </div>

                    <!-- Password Strength Indicator -->
                    <div v-if="form.password" class="space-y-2">
                        <div class="flex items-center gap-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Password Strength:
                            <div class="flex-1 h-2 bg-gray-200 dark:bg-zinc-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-red-400 to-emerald-500 rounded-full transition-all duration-500" :style="{ width: passwordStrength + '%' }"></div>
                            </div>
                            <span class="font-bold text-sm" :class="strengthClass">{{ passwordStrengthLabel }}</span>
                        </div>
                    </div>

                    <!-- Submit Section -->
                    <div class="pt-8 border-t-2 border-gray-200/30 dark:border-zinc-700/50 flex flex-col sm:flex-row items-center gap-6">
                        <PrimaryButton 
                            :disabled="form.processing"
                            class="group relative px-12 py-5 text-xl font-black rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 flex-1 sm:flex-none bg-gradient-to-r from-[#FF2D20] via-red-600 to-rose-600 text-white border-2 border-transparent hover:border-white/30 overflow-hidden"
                        >
                            <div class="absolute inset-0 bg-white/10 group-hover:bg-white/20 backdrop-blur-sm transition-all duration-300"></div>
                            <div class="relative flex items-center gap-3">
                                <svg v-if="form.processing" class="w-6 h-6 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span v-else class="flex items-center gap-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ form.processing ? 'Updating...' : 'Update Password' }}
                                </span>
                            </div>
                        </PrimaryButton>

                        <!-- Success Message -->
                        <Transition
                            enter-active-class="animate-in slide-in-from-top-2 duration-300"
                            enter-from-class="opacity-0"
                            leave-active-class="animate-out slide-out-to-top-2 duration-300"
                            leave-to-class="opacity-0"
                        >
                            <div v-if="form.recentlySuccessful" class="flex items-center gap-3 bg-emerald-50/80 dark:bg-emerald-900/40 border border-emerald-200/50 dark:border-emerald-800/50 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
                                <div class="w-6 h-6 bg-emerald-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-emerald-800 dark:text-emerald-200">Password Updated Successfully!</p>
                                    <p class="text-sm text-emerald-700 dark:text-emerald-300 mt-1">Your account is now more secure.</p>
                                </div>
                            </div>
                        </Transition>
                    </div>
                </form>
            </div>

            <!-- Security Tips -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6 rounded-2xl bg-gradient-to-br from-blue-500/10 to-indigo-500/10 border-2 border-blue-200/50 dark:border-blue-800/50 backdrop-blur-sm hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 mx-auto mb-4 bg-blue-500 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">Strong Password</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Use 12+ characters with uppercase, numbers & symbols</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border-2 border-emerald-200/50 dark:border-emerald-800/50 backdrop-blur-sm hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 mx-auto mb-4 bg-emerald-500 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">Unique Password</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Don't reuse passwords across different services</p>
                </div>
                <div class="text-center p-6 rounded-2xl bg-gradient-to-br from-purple-500/10 to-violet-500/10 border-2 border-purple-200/50 dark:border-purple-800/50 backdrop-blur-sm hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 mx-auto mb-4 bg-purple-500 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.118 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.118 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.118 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.118z"/>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-2">2FA Ready</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Enable 2FA after password update for extra security</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
// Password strength logic (computed properties for reactivity)
const passwordStrength = computed(() => {
    const value = form.password;
    let strength = 0;
    if (value.length > 8) strength += 25;
    if (/[a-z]/.test(value)) strength += 15;
    if (/[A-Z]/.test(value)) strength += 15;
    if (/[0-9]/.test(value)) strength += 20;
    if (/[^A-Za-z0-9]/.test(value)) strength += 25;
    return Math.min(100, strength);
});

const strengthClass = computed(() => {
    const strength = passwordStrength.value;
    if (strength < 40) return 'text-red-600 font-bold';
    if (strength < 70) return 'text-amber-600 font-bold';
    return 'text-emerald-600 font-bold';
});

const passwordStrengthLabel = computed(() => {
    const strength = passwordStrength.value;
    if (strength < 40) return 'Weak';
    if (strength < 70) return 'Medium';
    return 'Strong';
});
</script>

<style scoped>
.group:focus-within .group-focus-within\:text-\[#FF2D20\] {
    color: #FF2D20;
}
</style>
