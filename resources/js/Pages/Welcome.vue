<script setup>
import { Head, Link } from '@inertiajs/vue3'

// Props passed from Laravel controller
defineProps({
    canLogin: { type: Boolean },
    canRegister: { type: Boolean },
    laravelVersion: { type: String, required: true },
    phpVersion: { type: String, required: true },
})

// Function for optional image error handling
function handleImageError() {
    const screenshotContainer = document.getElementById('screenshot-container')
    const docsCard = document.getElementById('docs-card')
    const docsCardContent = document.getElementById('docs-card-content')
    const background = document.getElementById('background')
    
    screenshotContainer?.classList.add('!hidden')
    docsCard?.classList.add('!row-span-1')
    docsCardContent?.classList.add('!flex-row')
    background?.classList.add('!hidden')
}
</script>

<template>
    <Head title="Enterprise Dashboard" />

    <div class="relative bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-gray-900 dark:via-zinc-900 dark:to-slate-900 text-gray-900 dark:text-gray-100 min-h-screen overflow-hidden">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 opacity-20 dark:opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #FF2D20 0%, transparent 50%), radial-gradient(circle at 75% 75%, #3B82F6 0%, transparent 50%)"></div>
        </div>

        <div class="relative flex flex-col items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
            <!-- Floating Particles -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-20 left-10 w-2 h-2 bg-[#FF2D20]/20 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                <div class="absolute top-1/2 right-20 w-3 h-3 bg-blue-500/20 rounded-full animate-ping" style="animation-delay: 1s"></div>
                <div class="absolute bottom-32 left-1/4 w-1.5 h-1.5 bg-indigo-400/20 rounded-full animate-pulse" style="animation-delay: 2s"></div>
            </div>

            <!-- Header -->
            <header class="grid grid-cols-1 lg:grid-cols-3 items-center gap-6 py-12 lg:py-16 w-full max-w-7xl z-10">
                <div class="lg:col-start-2 lg:col-span-1 flex justify-center lg:justify-center">
                    <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/80 dark:bg-zinc-800/50 backdrop-blur-xl shadow-xl border border-white/20 dark:border-zinc-700/50">
                        <div class="w-12 h-12 bg-gradient-to-r from-[#FF2D20] to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h1 class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent tracking-tight">
                            Enterprise Dashboard
                        </h1>
                    </div>
                </div>

                <!-- Login/Register Links -->
                <nav v-if="canLogin" class="flex flex-col sm:flex-row justify-center sm:justify-end gap-3 lg:gap-4">
                    <Link
                        v-if="$page.props.auth?.user"
                        :href="route('dashboard')"
                        class="group relative px-6 py-3 bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-2xl text-gray-900 dark:text-white font-semibold shadow-2xl border border-white/30 dark:border-zinc-600/40 hover:bg-white dark:hover:bg-zinc-700 hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-1 hover:ring-2 hover:ring-[#FF2D20]/30"
                    >
                        <span class="relative z-10 flex items-center gap-2">
                            Dashboard
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="px-6 py-3 bg-gradient-to-r from-[#FF2D20] to-red-600 text-white font-semibold rounded-2xl shadow-2xl hover:shadow-3xl hover:from-red-600 hover:to-red-700 transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ring-2 ring-[#FF2D20]/20"
                        >
                            Log in
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-2xl shadow-2xl hover:shadow-3xl hover:from-blue-600 hover:to-indigo-700 transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 ring-2 ring-blue-500/20"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </header>

            <!-- Main Cards Section -->
            <main class="mt-12 lg:mt-20 w-full max-w-7xl z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6 lg:gap-8">
                    <!-- Dashboard Card -->
                    <Link
                        :href="route('admin.dashboard')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-[#FF2D20]/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-[#FF2D20]/5 to-transparent rounded-3xl group-hover:from-[#FF2D20]/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-[#FF2D20] to-red-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h6v6H3V3zM15 3h6v6h-6V3zM3 15h6v6H3v-6zM15 15h6v6h-6v-6z"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Dashboard
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Comprehensive overview of your company's metrics and recent activity with real-time insights.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-[#FF2D20] transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Employees Card -->
                    <Link
                        :href="route('employees.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-blue-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400/5 to-transparent rounded-3xl group-hover:from-blue-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 0-8 0 4 4 0 0 0 8 0zM12 14c-4 0-6 2-6 4v1h12v-1c0-2-2-4-6-4z"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Employees
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Complete employee management with profiles, roles, permissions, and activity tracking.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-blue-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Clients Card -->
                    <Link
                        :href="route('clients.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-emerald-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-400/5 to-transparent rounded-3xl group-hover:from-emerald-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 20H4v-2a4 4 0 0 1 3-3.87M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Clients
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Powerful client relationship management with complete contact and history tracking.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-emerald-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Projects Card -->
                    <Link
                        :href="route('projects.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-purple-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-400/5 to-transparent rounded-3xl group-hover:from-purple-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-purple-500 to-violet-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7M3 7l9 6 9-6"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Projects
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Advanced project management with timeline tracking, milestones, and team collaboration.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-purple-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Tasks Card -->
                    <Link
                        :href="route('tasks.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-orange-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-400/5 to-transparent rounded-3xl group-hover:from-orange-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-orange-500 to-amber-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1 9H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2z"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Tasks
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Smart task management system with assignments, priorities, deadlines, and team progress.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-orange-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Reports Card -->
                    <Link
                        :href="route('reports.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-indigo-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-400/5 to-transparent rounded-3xl group-hover:from-indigo-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3h2a2 2 0 0 1 2 2v16l-6-6H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6z"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Reports
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Advanced analytics and reporting with customizable dashboards and data export features.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-indigo-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Manage Users -->
                    <Link
                        :href="route('users.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-pink-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-pink-400/5 to-transparent rounded-3xl group-hover:from-pink-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-pink-500 to-rose-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5v14"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Manage Users
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Create and manage system users and roles.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-pink-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Companies -->
                    <Link
                        :href="route('companies.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-green-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-green-400/5 to-transparent rounded-3xl group-hover:from-green-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M9 8h6M9 12h6M9 16h6M4 21V7l8-4 8 4v14"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Companies
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Manage company profiles and details.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-green-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Departments -->
                    <Link
                        :href="route('departments.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-yellow-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/5 to-transparent rounded-3xl group-hover:from-yellow-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-yellow-500 to-orange-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4v10l8 4 8-4V7z"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Departments
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Organize employees into departments.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-yellow-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Assign Tasks -->
                    <Link
                        :href="route('tasks.create')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-orange-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-400/5 to-transparent rounded-3xl group-hover:from-orange-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Assign Tasks
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Assign tasks to employees and teams.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-orange-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Team Members -->
                    <Link
                        :href="route('employees.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-indigo-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-400/5 to-transparent rounded-3xl group-hover:from-indigo-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 20H4v-2a4 4 0 0 1 3-3.87"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Team Members
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                View and manage team members.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-indigo-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- My Tasks -->
                    <Link
                        :href="route('employee.tasks.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-teal-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-400/5 to-transparent rounded-3xl group-hover:from-teal-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-teal-500 to-cyan-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                My Tasks
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                View tasks assigned to you.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-teal-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link>

                    <!-- Attendance -->
                    <!-- <Link
                        :href="route('attendance.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-cyan-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/5 to-transparent rounded-3xl group-hover:from-cyan-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Attendance
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Track employee attendance.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-cyan-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link> -->

                    <!-- Leave Requests -->
                    <!-- <Link
                        :href="route('leaves.index')"
                        class="group relative flex flex-col items-start gap-6 rounded-3xl bg-white/70 dark:bg-zinc-800/60 backdrop-blur-xl p-8 shadow-2xl hover:shadow-3xl border border-white/40 dark:border-zinc-700/50 hover:border-red-400/30 hover:bg-white/90 dark:hover:bg-zinc-700/80 transition-all duration-500 transform hover:-translate-y-3 hover:scale-[1.02]"
                    >
                        <div class="absolute inset-0 bg-gradient-to-br from-red-400/5 to-transparent rounded-3xl group-hover:from-red-400/10"></div>
                        <div class="relative flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-r from-red-500 to-pink-500 shadow-xl group-hover:scale-110 transition-all duration-300 z-10">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/>
                            </svg>
                        </div>
                        <div class="relative">
                            <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                                Leave Requests
                            </h2>
                            <p class="text-gray-600 dark:text-gray-300 font-medium leading-relaxed">
                                Manage employee leave requests.
                            </p>
                        </div>
                        <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <svg class="w-6 h-6 text-red-400 transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </Link> -->
                </div>
            </main>

            <!-- Enhanced Footer -->
            <footer class="mt-24 pt-16 pb-12 text-center text-sm">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-6 opacity-80">
                        <div class="flex items-center gap-3 text-xs">
                            <div class="w-2 h-2 bg-[#FF2D20] rounded-full animate-pulse"></div>
                            <span>Powered by modern technology stack</span>
                        </div>
                        <div class="h-px bg-gradient-to-r from-transparent via-white/30 to-transparent flex-1"></div>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 font-medium">
                        Enterprise Dashboard • Built for scale and performance
                    </p>
                </div>
            </footer>
        </div>
    </div>
</template>

<style scoped>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}
</style>
