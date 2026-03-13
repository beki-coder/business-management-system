<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/50 to-indigo-100/30 dark:from-gray-900 dark:via-zinc-900/50 dark:to-slate-900/30 p-6 lg:p-12 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10 dark:opacity-20">
      <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, #FF2D20 0%, transparent 50%), radial-gradient(circle at 80% 20%, #3B82F6 0%, transparent 50%)"></div>
    </div>

    <!-- Floating Stats Cards -->
    <div class="max-w-7xl mx-auto mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="group bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/40 dark:border-zinc-700/50 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-16 h-16 bg-gradient-to-r from-[#FF2D20] to-red-500 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
          <div>
            <p class="text-3xl font-black text-gray-900 dark:text-white">{{ employees.length }}</p>
            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold">Total Employees</p>
          </div>
        </div>
        <p class="text-gray-600 dark:text-gray-300">Manage your enterprise workforce efficiently</p>
      </div>

      <div class="group bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/40 dark:border-zinc-700/50 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-16 h-16 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300 animate-pulse">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
          </div>
          <div>
            <p class="text-3xl font-black text-gray-900 dark:text-white">98%</p>
            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold">Active</p>
          </div>
        </div>
        <p class="text-gray-600 dark:text-gray-300">Employee engagement rate</p>
      </div>

      <div class="group bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/40 dark:border-zinc-700/50 hover:shadow-3xl hover:-translate-y-2 transition-all duration-500">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
          </div>
          <div>
            <p class="text-3xl font-black text-gray-900 dark:text-white">12</p>
            <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold">New This Week</p>
          </div>
        </div>
        <p class="text-gray-600 dark:text-gray-300">Recent onboarding activity</p>
      </div>
    </div>

    <div class="max-w-7xl mx-auto bg-white/70 dark:bg-zinc-800/70 backdrop-blur-xl shadow-2xl rounded-3xl p-8 lg:p-12 border border-white/40 dark:border-zinc-700/50">
      <!-- Enhanced Header -->
      <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-10 gap-6">
        <div>
          <h1 class="text-4xl lg:text-5xl font-black bg-gradient-to-r from-gray-900 via-[#FF2D20] to-red-700 dark:from-white dark:via-red-400 dark:to-rose-400 bg-clip-text text-transparent tracking-tight mb-3">
            Employee Management
          </h1>
          <p class="text-xl text-gray-600 dark:text-gray-300 font-medium max-w-2xl leading-relaxed">
            Manage your enterprise workforce with complete control over profiles, roles, and permissions
          </p>
        </div>
        <Link
          href="/admin/employees/create"
          class="group relative px-8 py-5 text-xl font-black rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 hover:scale-[1.02] transition-all duration-500 bg-gradient-to-r from-[#FF2D20] via-red-600 to-rose-600 text-white border-2 border-transparent hover:border-white/50 overflow-hidden flex items-center gap-3"
        >
          <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 backdrop-blur-sm transition-all duration-300"></div>
          <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          <span>Create Employee</span>
        </Link>
      </div>

      <!-- Enhanced Search & Filter -->
      <div class="bg-gradient-to-r from-blue-50/50 to-indigo-50/30 dark:from-blue-900/20 dark:to-indigo-900/10 backdrop-blur-xl rounded-2xl p-6 mb-8 border border-blue-200/50 dark:border-blue-800/50">
        <div class="flex flex-col lg:flex-row gap-4 items-center justify-between">
          <div class="relative flex-1 max-w-md">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </div>
            <input
              type="text"
              placeholder="Search employees by name or email..."
              class="w-full pl-12 pr-4 py-4 bg-white/60 dark:bg-zinc-800/50 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-zinc-700/50 text-lg font-semibold focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 shadow-inner transition-all duration-300 placeholder-gray-400"
            />
          </div>
          <div class="flex gap-2">
            <button class="px-6 py-3 bg-white/70 dark:bg-zinc-700/70 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-zinc-600/50 text-gray-700 dark:text-gray-300 font-semibold hover:bg-white hover:shadow-md transition-all duration-300">
              All Departments
            </button>
            <button class="px-6 py-3 bg-white/70 dark:bg-zinc-700/70 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-zinc-600/50 text-gray-700 dark:text-gray-300 font-semibold hover:bg-white hover:shadow-md transition-all duration-300">
              Active Only
            </button>
          </div>
        </div>
      </div>

      <!-- Premium Data Table -->
      <div class="overflow-hidden rounded-2xl border-2 border-gray-200/50 dark:border-zinc-700/50 shadow-xl bg-white/50 dark:bg-zinc-900/30 backdrop-blur-xl">
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead class="bg-gradient-to-r from-gray-100/80 to-gray-200/60 dark:from-zinc-800/70 dark:to-zinc-700/50 backdrop-blur-sm sticky top-0 z-10">
              <tr>
                <th class="px-8 py-6 text-left text-lg font-black text-gray-900 dark:text-white uppercase tracking-wider">
                  <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Employee Name
                  </div>
                </th>
                <th class="px-8 py-6 text-left text-lg font-black text-gray-900 dark:text-white uppercase tracking-wider">
                  <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.27 5.05c.4.28.94.28 1.34 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email Address
                  </div>
                </th>
                <th class="px-8 py-6 text-left text-lg font-black text-gray-900 dark:text-white uppercase tracking-wider">
                  <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Quick Actions
                  </div>
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200/50 dark:divide-zinc-700/50">
              <tr
                v-for="employee in employees"
                :key="employee.id"
                class="group hover:bg-white/80 dark:hover:bg-zinc-700/50 transition-all duration-300 border-b-2 border-transparent hover:border-[#FF2D20]/20 hover:shadow-xl hover:-translate-y-1"
              >
                <td class="px-8 py-8">
                  <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-[#FF2D20] to-red-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-300">
                      <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12a1 1 0 011-.5V8a2 2 0 00-2-2h-4a1 1 0 01-1-1V3a1 1 0 00-2 0v1a1 1 0 01-1 1H6a2 2 0 00-2 2v3.5A1 1 0 013 12a1 1 0 01-1 .5 1 1 0 01-1-.5V8a3 3 0 013-3h4a2 2 0 012 2v1a2 2 0 002-2h4a3 3 0 013 3v3.5a1 1 0 01-.5.866zM4 19a1 1 0 01-.707-1.707L5.586 15H3a1 1 0 01-1-1v-3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-1 1H10.414l1.293 2.293A1 1 0 0112 19h3a1 1 0 011 1v1a1 1 0 01-1 1H4a1 1 0 01-1-1v-1z"/>
                      </svg>
                    </div>
                    <div>
                      <p class="font-bold text-xl text-gray-900 dark:text-white group-hover:text-[#FF2D20] transition-colors duration-300">{{ employee.name }}</p>
                      <p class="text-sm text-gray-500">Software Developer</p>
                    </div>
                  </div>
                </td>
                <td class="px-8 py-8">
                  <div class="flex items-center gap-3">
                    <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white break-all">{{ employee.email }}</p>
                  </div>
                </td>
                <td class="px-8 py-8">
                  <div class="flex items-center gap-3">
                    <Link
                      :href="`/admin/employees/${employee.id}`"
                      class="group/btn relative px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden"
                    >
                      <div class="absolute inset-0 bg-white/20 group-hover/btn:bg-white/30 backdrop-blur-sm transition-all duration-300"></div>
                      <svg class="w-5 h-5 relative z-10 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                      </svg>
                      View
                    </Link>
                    <Link
                      :href="`/admin/employees/${employee.id}/edit`"
                      class="group/btn relative px-6 py-3 bg-gradient-to-r from-amber-500 to-yellow-500 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden"
                    >
                      <div class="absolute inset-0 bg-white/20 group-hover/btn:bg-white/30 backdrop-blur-sm transition-all duration-300"></div>
                      <svg class="w-5 h-5 relative z-10 group-hover/btn:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.5h3m1 1a2 2 0 11-4 0 2 2 0 014 0z"/>
                      </svg>
                      Edit
                    </Link>
                    <button
                      @click="deleteEmployee(employee.id)"
                      class="group/btn relative px-6 py-3 bg-gradient-to-r from-rose-500 to-red-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 overflow-hidden"
                    >
                      <div class="absolute inset-0 bg-white/20 group-hover/btn:bg-white/30 backdrop-blur-sm transition-all duration-300"></div>
                      <svg class="w-5 h-5 relative z-10 group-hover/btn:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                      </svg>
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
              <tr v-if="employees.length === 0" class="group">
                <td colspan="3" class="text-center py-24">
                  <div class="flex flex-col items-center gap-6">
                    <div class="w-32 h-32 bg-gradient-to-r from-gray-200 to-gray-300 dark:from-zinc-700 dark:to-zinc-600 rounded-3xl flex items-center justify-center shadow-2xl group-hover:scale-110 transition-all duration-500">
                      <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                      </svg>
                    </div>
                    <div class="space-y-3">
                      <h3 class="text-3xl font-black text-gray-500 dark:text-gray-400">No Employees Yet</h3>
                      <p class="text-xl text-gray-400 dark:text-gray-500 max-w-md mx-auto leading-relaxed">
                        Your enterprise team is ready to grow. Create your first employee profile to get started.
                      </p>
                    </div>
                    <Link
                      href="/admin/employees/create"
                      class="group relative px-8 py-4 text-lg font-black rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 hover:scale-[1.02] transition-all duration-500 bg-gradient-to-r from-emerald-500 to-teal-600 text-white border-2 border-transparent hover:border-white/50 overflow-hidden"
                    >
                      <div class="absolute inset-0 bg-white/20 group-hover:bg-white/30 backdrop-blur-sm transition-all duration-300"></div>
                      <span class="relative flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Create First Employee
                      </span>
                    </Link>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination Placeholder -->
      <div class="mt-12 flex items-center justify-between">
        <div class="text-sm text-gray-500 dark:text-gray-400">
          Showing <span class="font-semibold text-[#FF2D20]">{{ employees.length }}</span> of <span class="font-semibold">{{ employees.length }}</span> employees
        </div>
        <div class="flex gap-2">
          <button class="px-4 py-2 bg-white/70 dark:bg-zinc-700/70 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-zinc-600/50 text-gray-700 dark:text-gray-300 font-semibold hover:bg-white hover:shadow-md transition-all duration-300">Previous</button>
          <button class="px-4 py-2 bg-gradient-to-r from-[#FF2D20] to-red-500 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">1</button>
          <button class="px-4 py-2 bg-white/70 dark:bg-zinc-700/70 backdrop-blur-sm rounded-xl border border-gray-200/50 dark:border-zinc-600/50 text-gray-700 dark:text-gray-300 font-semibold hover:bg-white hover:shadow-md transition-all duration-300">Next</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  employees: Array
})

function deleteEmployee(id) {
  if (confirm('Are you sure you want to delete this employee?')) {
    router.delete(`/admin/employees/${id}`)
  }
}
</script>
