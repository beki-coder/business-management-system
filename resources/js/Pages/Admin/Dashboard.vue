<script setup>
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Admin Dashboard" />

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-5xl md:text-6xl font-black bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 bg-clip-text text-transparent drop-shadow-2xl mb-4">
                    Admin Dashboard
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Employees Card -->
                <Link 
                    href="/admin/employees" 
                    class="group relative p-8 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl hover:rounded-2xl transition-all duration-500 hover:scale-105 hover:bg-white/20 shadow-2xl hover:shadow-3xl hover:-translate-y-2"
                >
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-indigo-600/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Icon -->
                    <div class="relative z-10 flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white/20 backdrop-blur-sm rounded-2xl group-hover:bg-white/30 transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-white text-center drop-shadow-lg">Manage Employees</h3>
                    <p class="text-slate-300 text-sm text-center opacity-80 group-hover:opacity-100 transition-opacity">View, add, edit and manage all employee records</p>
                    
                    <!-- Arrow -->
                    <div class="absolute bottom-6 right-6 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 opacity-0 group-hover:opacity-100">
                        <svg class="w-5 h-5 text-white transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </Link>

                <!-- Clients Card -->
                <Link 
                    href="/admin/clients" 
                    class="group relative p-8 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl hover:rounded-2xl transition-all duration-500 hover:scale-105 hover:bg-white/20 shadow-2xl hover:shadow-3xl hover:-translate-y-2"
                >
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/20 to-teal-600/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Icon -->
                    <div class="relative z-10 flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white/20 backdrop-blur-sm rounded-2xl group-hover:bg-white/30 transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-white text-center drop-shadow-lg">Manage Clients</h3>
                    <p class="text-slate-300 text-sm text-center opacity-80 group-hover:opacity-100 transition-opacity">Handle client relationships and information</p>
                    
                    <!-- Arrow -->
                    <div class="absolute bottom-6 right-6 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 opacity-0 group-hover:opacity-100">
                        <svg class="w-5 h-5 text-white transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </Link>

                <!-- Reports Card -->
                <Link 
                    href="/reports" 
                    class="group relative p-8 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl hover:rounded-2xl transition-all duration-500 hover:scale-105 hover:bg-white/20 shadow-2xl hover:shadow-3xl hover:-translate-y-2"
                >
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-pink-600/20 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Icon -->
                    <div class="relative z-10 flex items-center justify-center w-20 h-20 mx-auto mb-6 bg-white/20 backdrop-blur-sm rounded-2xl group-hover:bg-white/30 transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    
                    <!-- Content -->
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-white text-center drop-shadow-lg">View Reports</h3>
                    <p class="text-slate-300 text-sm text-center opacity-80 group-hover:opacity-100 transition-opacity">Generate insights and analytics reports</p>
                    
                    <!-- Arrow -->
                    <div class="absolute bottom-6 right-6 w-8 h-8 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center group-hover:bg-white/30 transition-all duration-300 opacity-0 group-hover:opacity-100">
                        <svg class="w-5 h-5 text-white transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </Link>
            </div>
        </div>
    </div>
</template>
