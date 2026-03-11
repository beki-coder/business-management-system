<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: { type: Boolean },
    canRegister: { type: Boolean },
    laravelVersion: { type: String, required: true },
    phpVersion: { type: String, required: true },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Enterprise Dashboard" />

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen">
        <div class="relative flex flex-col items-center justify-center min-h-screen px-6 lg:px-0">
            
            <!-- Header -->
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3 w-full max-w-7xl">
                <div class="flex lg:col-start-2 lg:justify-center">
                    <h1 class="text-3xl font-bold text-[#FF2D20] dark:text-white">Enterprise Dashboard</h1>
                </div>

                <!-- Login/Register -->
                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:text-black/70 dark:text-white dark:hover:text-white/80 focus-visible:ring-[#FF2D20]"
                    >
                        Dashboard
                    </Link>
                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:text-black/70 dark:text-white dark:hover:text-white/80 focus-visible:ring-[#FF2D20]"
                        >
                            Log in
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:text-black/70 dark:text-white dark:hover:text-white/80 focus-visible:ring-[#FF2D20]"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </header>

            <!-- Main Cards -->
            <main class="mt-6 w-full max-w-7xl">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

                    <!-- Dashboard Card -->
                    <Link
                        :href="route('admin.dashboard')"
                        class="flex flex-col items-start gap-6 rounded-lg bg-white p-6 shadow hover:ring-1 hover:ring-[#FF2D20] dark:bg-zinc-900 dark:hover:ring-[#FF2D20]"
                    >
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#FF2D20]/10">
                            <svg class="w-6 h-6 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h6v6H3V3zM15 3h6v6h-6V3zM3 15h6v6H3v-6zM15 15h6v6h-6v-6z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-black dark:text-white">Dashboard</h2>
                            <p class="mt-2 text-sm dark:text-white/70">
                                Overview of your company's metrics and recent activity.
                            </p>
                        </div>
                    </Link>
                    <!-- Employees Card -->
                    <Link
                        :href="route('employees.index')"
                        class="flex flex-col items-start gap-6 rounded-lg bg-white p-6 shadow hover:ring-1 hover:ring-[#FF2D20] dark:bg-zinc-900 dark:hover:ring-[#FF2D20]"
                    >
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#FF2D20]/10">
                            <svg class="w-6 h-6 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 1 0-8 0 4 4 0 0 0 8 0zM12 14c-4 0-6 2-6 4v1h12v-1c0-2-2-4-6-4z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-black dark:text-white">Employees</h2>
                            <p class="mt-2 text-sm dark:text-white/70">
                                Manage employee profiles, roles, and activity.
                            </p>
                        </div>
                    </Link>

                    <!-- Clients Card -->
                    <Link
                        :href="route('clients.index')"
                        class="flex flex-col items-start gap-6 rounded-lg bg-white p-6 shadow hover:ring-1 hover:ring-[#FF2D20] dark:bg-zinc-900 dark:hover:ring-[#FF2D20]"
                    >
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#FF2D20]/10">
                            <svg class="w-6 h-6 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 0 0-3-3.87M9 20H4v-2a4 4 0 0 1 3-3.87M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-black dark:text-white">Clients</h2>
                            <p class="mt-2 text-sm dark:text-white/70">
                                Track your clients and maintain their information.
                            </p>
                        </div>
                    </Link>

                    <!-- Projects Card -->
                    <Link
                        :href="route('projects.index')"
                        class="flex flex-col items-start gap-6 rounded-lg bg-white p-6 shadow hover:ring-1 hover:ring-[#FF2D20] dark:bg-zinc-900 dark:hover:ring-[#FF2D20]"
                    >
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#FF2D20]/10">
                            <svg class="w-6 h-6 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7M3 7l9 6 9-6"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-black dark:text-white">Projects</h2>
                            <p class="mt-2 text-sm dark:text-white/70">
                                Monitor and manage all your ongoing projects.
                            </p>
                        </div>
                    </Link>

                    <!-- Tasks Card -->
                    <Link
                        :href="route('tasks.index')"
                        class="flex flex-col items-start gap-6 rounded-lg bg-white p-6 shadow hover:ring-1 hover:ring-[#FF2D20] dark:bg-zinc-900 dark:hover:ring-[#FF2D20]">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#FF2D20]/10">
                            <svg class="w-6 h-6 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1 9H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-black dark:text-white">Tasks</h2>
                            <p class="mt-2 text-sm dark:text-white/70">
                                Assign, track, and complete tasks across teams.
                            </p>
                        </div>
                    </Link>

                    <!-- Reports Card -->
                    <Link
                        :href="route('reports.index')"
                        class="flex flex-col items-start gap-6 rounded-lg bg-white p-6 shadow hover:ring-1 hover:ring-[#FF2D20] dark:bg-zinc-900 dark:hover:ring-[#FF2D20]"
                    >
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#FF2D20]/10">
                            <svg class="w-6 h-6 text-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3h2a2 2 0 0 1 2 2v16l-6-6H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-black dark:text-white">Reports</h2>
                            <p class="mt-2 text-sm dark:text-white/70">
                                Generate and analyze reports for your business metrics.
                            </p>
                        </div>
                    </Link>

                </div>
            </main>

            <!-- Footer -->
            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
            </footer>
        </div>
    </div>
</template>