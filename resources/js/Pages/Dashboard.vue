<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-[#FF2D20] to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h6v6H3V3zM15 3h6v6h-6V3zM3 15h6v6H3v-6zM15 15h6v6h-6v-6z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-3xl font-black bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent tracking-tight">
                        Dashboard
                    </h2>
                    <p class="text-sm text-gray-500 font-medium mt-1">Welcome back! Here's what's happening today.</p>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-8">
                
                <!-- Stats Cards Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Employees -->
                    <div class="group relative bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-[#FF2D20]/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#FF2D20]/5 to-transparent rounded-3xl group-hover:from-[#FF2D20]/10"></div>
                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-r from-[#FF2D20] to-red-500 shadow-xl group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 0-8 0 4 4 0 0 0 8 0zM12 14c-4 0-6 2-6 4v1h12v-1c0-2-2-4-6-4z"/>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-black text-gray-900 dark:text-white">247</p>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Employees</p>
                                </div>
                            </div>
                            <div class="flex-1"></div>
                            <div class="flex items-center gap-2 text-sm text-green-600 font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>12 new this week</span>
                            </div>
                        </div>
                    </div>

                    <!-- Active Projects -->
                    <div class="group relative bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-blue-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400/5 to-transparent rounded-3xl group-hover:from-blue-400/10"></div>
                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-500 shadow-xl group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7M3 7l9 6 9-6"/>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-black text-gray-900 dark:text-white">89</p>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Projects</p>
                                </div>
                            </div>
                            <div class="flex-1"></div>
                            <div class="flex items-center gap-2 text-sm text-emerald-600 font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>5 completed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue -->
                    <div class="group relative bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-emerald-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/5 to-transparent rounded-3xl group-hover:from-emerald-400/10"></div>
                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 shadow-xl group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08 .402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-black text-gray-900 dark:text-white">$<span class="text-2xl">156</span>K</p>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Revenue</p>
                                </div>
                            </div>
                            <div class="flex-1"></div>
                            <div class="flex items-center gap-2 text-sm text-emerald-600 font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>18% increase</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tasks -->
                    <div class="group relative bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-orange-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02]">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-400/5 to-transparent rounded-3xl group-hover:from-orange-400/10"></div>
                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-r from-orange-500 to-amber-500 shadow-xl group-hover:scale-110 transition-all duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1 9H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2z"/>
                                    </svg>
                                </div>
                                <div class="text-right">
                                    <p class="text-3xl font-black text-gray-900 dark:text-white">23</p>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold">Pending</p>
                                </div>
                            </div>
                            <div class="flex-1"></div>
                            <div class="flex items-center gap-2 text-sm text-amber-600 font-semibold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span>3 urgent</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Welcome & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Welcome Section -->
                    <div class="bg-gradient-to-br from-white/80 via-blue-50/70 to-indigo-50/50 dark:from-zinc-800/70 dark:via-slate-800/50 dark:to-gray-900/50 backdrop-blur-xl rounded-3xl p-10 shadow-2xl border border-white/40 dark:border-zinc-700/50">
                        <div class="flex items-start gap-6">
                            <div class="w-20 h-20 bg-gradient-to-r from-[#FF2D20] to-red-500 rounded-2xl flex items-center justify-center shadow-2xl flex-shrink-0">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-3 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                    Welcome back, Bereket!
                                </h3>
                                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                                    You're logged in and ready to manage your enterprise. Here's a quick overview of your key metrics and recent activity.
                                </p>
                                <div class="grid grid-cols-2 gap-4 pt-6 border-t border-gray-200/50 dark:border-zinc-700/50">
                                    <div class="text-center p-4 rounded-2xl bg-white/50 dark:bg-zinc-700/30 backdrop-blur-sm hover:bg-white/70 transition-all duration-300">
                                        <div class="text-2xl font-bold text-[#FF2D20]">14</div>
                                        <div class="text-xs text-gray-500 uppercase tracking-wider">Notifications</div>
                                    </div>
                                    <div class="text-center p-4 rounded-2xl bg-white/50 dark:bg-zinc-700/30 backdrop-blur-sm hover:bg-white/70 transition-all duration-300">
                                        <div class="text-2xl font-bold text-blue-600">3</div>
                                        <div class="text-xs text-gray-500 uppercase tracking-wider">New Messages</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/40 dark:border-zinc-700/50">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-6 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                            Quick Actions
                        </h3>
                        <div class="grid grid-cols-2 gap-4">
                            <button class="group relative p-6 rounded-2xl bg-gradient-to-r from-[#FF2D20] to-red-500 text-white font-semibold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 transition-all duration-300"></div>
                                <div class="relative flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <span>New Employee</span>
                                </div>
                            </button>
                            <button class="group relative p-6 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 transition-all duration-300"></div>
                                <div class="relative flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                    <span>View Reports</span>
                                </div>
                            </button>
                            <button class="group relative p-6 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-semibold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 transition-all duration-300"></div>
                                <div class="relative flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Check Tasks</span>
                                </div>
                            </button>
                            <button class="group relative p-6 rounded-2xl bg-gradient-to-r from-purple-500 to-violet-500 text-white font-semibold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 transition-all duration-300"></div>
                                <div class="relative flex flex-col items-center gap-2">
                                    <svg class="w-8 h-8 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span>New Client</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/40 dark:border-zinc-700/50">
                    <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-8 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent flex items-center gap-3">
                        Recent Activity
                        <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white/50 dark:hover:bg-zinc-700/50 transition-all duration-300 group">
                            <div class="w-12 h-12 bg-gradient-to-r from-[#FF2D20] to-red-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-105 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-900 dark:text-white truncate">Added new employee profile</p>
                                <p class="text-sm text-gray-500">John Doe joined the development team • 2 hours ago</p>
                            </div>
                            <div class="text-xs text-gray-400 ml-auto">Today</div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white/50 dark:hover:bg-zinc-700/50 transition-all duration-300 group">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-105 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-900 dark:text-white truncate">Project "Q1 Launch" completed</p>
                                <p class="text-sm text-gray-500">All milestones achieved successfully • Yesterday</p>
                            </div>
                            <div class="text-xs text-gray-400 ml-auto">Yesterday</div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-2xl hover:bg-white/50 dark:hover:bg-zinc-700/50 transition-all duration-300 group">
                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-105 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-gray-900 dark:text-white truncate">Client ABC Corp approved invoice</p>
                                <p class="text-sm text-gray-500">Payment of $12,450 received • 3 days ago</p>
                            </div>
                            <div class="text-xs text-gray-400 ml-auto">3 days ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
}

.hover\:scale-\[1\.02\]:hover {
    transform: scale(1.02);
}
</style>