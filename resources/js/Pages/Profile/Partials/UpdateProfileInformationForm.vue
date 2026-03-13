<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section class="relative min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/50 to-indigo-100/30 dark:from-gray-900 dark:via-zinc-900/50 dark:to-slate-900/30 py-16">
        <!-- Floating Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-r from-[#FF2D20]/20 to-transparent rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-r from-blue-400/10 to-indigo-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>
        </div>

        <div class="relative max-w-2xl mx-auto px-6 lg:px-8">
            <!-- Enhanced Profile Header -->
            <header class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-24 h-24 mx-auto mb-8 bg-gradient-to-r from-[#FF2D20] to-red-500 rounded-3xl shadow-2xl border-4 border-white/30 backdrop-blur-xl">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-gray-900 via-[#FF2D20] to-red-700 dark:from-white dark:via-red-400 dark:to-rose-400 bg-clip-text text-transparent tracking-tight mb-4">
                        Profile Settings
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 font-medium leading-relaxed max-w-lg mx-auto">
                        Update your personal information and keep your enterprise account secure
                    </p>
                </div>
            </header>

            <!-- Main Form Card -->
            <div class="bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/40 dark:border-zinc-700/50 overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-br from-[#FF2D20]/5 via-transparent to-blue-500/5 group-hover:from-[#FF2D20]/10"></div>
                <div class="relative p-10">
                    <form @submit.prevent="form.patch(route('profile.update'))" class="space-y-8">
                        
                        <!-- Name Field -->
                        <div class="group relative">
                            <InputLabel for="name" value="Full Name" class="text-xl font-black text-gray-900 dark:text-white mb-4 tracking-wide uppercase bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent flex items-center gap-3">
                                <svg class="w-7 h-7 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </InputLabel>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none z-10">
                                    <svg class="w-6 h-6 text-gray-400 group-focus-within:text-[#FF2D20] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <TextInput
                                    id="name"
                                    type="text"
                                    class="block w-full pl-16 pr-12 py-6 text-xl border-2 border-gray-200/50 dark:border-zinc-600/50 rounded-2xl bg-white/60 dark:bg-zinc-900/40 backdrop-blur-sm shadow-inner focus:ring-4 focus:ring-[#FF2D20]/20 focus:border-[#FF2D20] font-semibold placeholder-gray-400 transition-all duration-400 hover:shadow-lg group-focus-within:shadow-2xl"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Enter your full name (e.g. Bereket Bogale)"
                                />
                                <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                                    <svg class="w-5 h-5 text-[#FF2D20] opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <InputError class="mt-4 bg-rose-50/80 dark:bg-rose-900/40 border-l-4 border-rose-400 p-4 rounded-xl shadow-md font-semibold text-rose-800 dark:text-rose-200 ml-3 transform translate-x-1 scale-95 group-hover:scale-100 transition-all duration-300" :message="form.errors.name" />
                        </div>

                        <!-- Divider -->
                        <div class="relative my-2">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full h-px bg-gradient-to-r from-transparent via-gray-300/50 to-transparent"></div>
                            </div>
                            <div class="relative flex justify-center">
                                <span class="px-6 py-3 bg-white/70 dark:bg-zinc-800/70 text-sm font-bold text-gray-500 uppercase tracking-wider rounded-full shadow-sm">Contact Email</span>
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="group relative">
                            <InputLabel for="email" value="Email Address" class="text-xl font-black text-gray-900 dark:text-white mb-4 tracking-wide uppercase bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent flex items-center gap-3">
                                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 5.05c.4.28.94.28 1.34 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </InputLabel>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none z-10">
                                    <svg class="w-6 h-6 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 5.05c.4.28.94.28 1.34 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="block w-full pl-16 pr-12 py-6 text-xl border-2 border-gray-200/50 dark:border-zinc-600/50 rounded-2xl bg-white/60 dark:bg-zinc-900/40 backdrop-blur-sm shadow-inner focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 font-semibold placeholder-gray-400 transition-all duration-400 hover:shadow-lg group-focus-within:shadow-2xl"
                                    v-model="form.email"
                                    required
                                    autocomplete="username"
                                    placeholder="your.email@company.com"
                                />
                                <div class="absolute inset-y-0 right-0 pr-5 flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <InputError class="mt-4 bg-blue-50/80 dark:bg-blue-900/40 border-l-4 border-blue-400 p-4 rounded-xl shadow-md font-semibold text-blue-800 dark:text-blue-200 ml-3 transform translate-x-1 scale-95 group-hover:scale-100 transition-all duration-300" :message="form.errors.email" />
                        </div>

                        <!-- Email Verification Section -->
                        <div v-if="mustVerifyEmail && user.email_verified_at === null" class="bg-gradient-to-r from-orange-50/80 via-amber-50/60 to-orange-100/40 dark:from-orange-900/20 dark:via-amber-900/10 dark:to-orange-950/20 backdrop-blur-xl rounded-3xl p-8 border-2 border-orange-200/50 dark:border-orange-800/50 shadow-xl">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 pt-1">
                                    <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-amber-500 rounded-2xl flex items-center justify-center shadow-lg border-2 border-white/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mb-3 bg-gradient-to-r from-gray-900 to-orange-900 dark:from-white dark:to-orange-400 bg-clip-text text-transparent">
                                        Email Verification Required
                                    </h4>
                                    <p class="text-lg text-gray-700 dark:text-gray-200 leading-relaxed mb-4">
                                        Your email address is unverified. Please check your inbox for the verification link.
                                    </p>
                                    <Link
                                        :href="route('verification.send')"
                                        method="post"
                                        as="button"
                                        class="group inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-600 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 border border-orange-400/50 hover:border-orange-500/80"
                                    >
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 5.05c.4.28.94.28 1.34 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        🔄 Re-send Verification Email
                                    </Link>
                                </div>
                            </div>

                            <!-- Verification Status -->
                            <Transition
                                enter-active-class="animate-in slide-in-from-top-2 duration-500"
                                enter-from-class="opacity-0 translate-y-2"
                                leave-active-class="animate-out slide-out-to-top-2 duration-300"
                                leave-to-class="opacity-0 translate-y-2"
                            >
                                <div v-show="status === 'verification-link-sent'" class="mt-6 pt-6 border-t-2 border-orange-200/50 dark:border-orange-800/50 flex items-center gap-3 bg-emerald-50/80 dark:bg-emerald-900/40 border border-emerald-200/50 dark:border-emerald-800/50 rounded-2xl p-6 shadow-xl backdrop-blur-sm">
                                    <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-lg font-bold text-emerald-800 dark:text-emerald-200">✅ Verification Link Sent!</p>
                                        <p class="text-sm text-emerald-700 dark:text-emerald-300 mt-1">Check your inbox - a new verification link has been sent to your email address.</p>
                                    </div>
                                </div>
                            </Transition>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-10 border-t-2 border-gray-200/30 dark:border-zinc-700/50 flex flex-col sm:flex-row items-center gap-6">
                            <PrimaryButton 
                                :disabled="form.processing"
                                class="group relative px-12 py-6 text-xl font-black rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 hover:scale-[1.02] transition-all duration-500 flex-1 sm:flex-none bg-gradient-to-r from-[#FF2D20] via-red-600 to-rose-600 text-white border-2 border-transparent hover:border-white/50 overflow-hidden"
                            >
                                <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 backdrop-blur-sm transition-all duration-300"></div>
                                <div class="relative flex items-center gap-3">
                                    <svg v-if="form.processing" class="w-7 h-7 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <svg v-else class="w-7 h-7 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>{{ form.processing ? 'Saving...' : 'Save Changes' }}</span>
                                </div>
                            </PrimaryButton>

                            <!-- Success Message -->
                            <Transition
                                enter-active-class="animate-in slide-in-from-top-4 duration-700"
                                enter-from-class="opacity-0 -translate-y-4"
                                leave-active-class="animate-out slide-out-to-top-4 duration-500"
                                leave-to-class="opacity-0 -translate-y-4"
                            >
                                <div v-if="form.recentlySuccessful" class="flex items-center gap-4 bg-emerald-50/90 dark:bg-emerald-900/50 border-2 border-emerald-200/50 dark:border-emerald-800/50 rounded-3xl p-8 shadow-2xl backdrop-blur-xl max-w-md">
                                    <div class="w-16 h-16 bg-emerald-500 rounded-3xl flex items-center justify-center shadow-2xl flex-shrink-0">
                                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-2xl font-black text-emerald-800 dark:text-emerald-200 mb-2">Profile Updated!</h4>
                                        <p class="text-lg text-emerald-700 dark:text-emerald-300 font-semibold">Your information has been saved successfully.</p>
                                    </div>
                                </div>
                            </Transition>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Profile Quick Stats -->
            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="group p-8 rounded-3xl bg-gradient-to-br from-blue-500/10 via-indigo-500/5 to-purple-500/10 border-2 border-blue-200/50 dark:border-blue-800/50 backdrop-blur-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 dark:text-white">Enterprise Admin</h4>
                            <p class="text-blue-600 dark:text-blue-400 font-bold">Your Role</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Manage 247 employees, 89 projects, and enterprise operations</p>
                </div>

                <div class="group p-8 rounded-3xl bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border-2 border-emerald-200/50 dark:border-emerald-800/50 backdrop-blur-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 dark:text-white">Verified</h4>
                            <p class="text-emerald-600 dark:text-emerald-400 font-bold">Account Status</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">Your account is fully verified and ready for enterprise operations</p>
                </div>

                <div class="group p-8 rounded-3xl bg-gradient-to-br from-purple-500/10 to-violet-500/10 border-2 border-purple-200/50 dark:border-purple-800/50 backdrop-blur-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 cursor-pointer">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-violet-500 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900 dark:text-white">Secure</h4>
                            <p class="text-purple-600 dark:text-purple-400 font-bold">Security Level</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">2FA ready - enable for maximum enterprise security</p>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}
</style>
