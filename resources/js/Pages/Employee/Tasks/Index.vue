<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent mb-4">
          My Tasks
        </h1>
        <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
      </div>

      <div class="bg-white/80 backdrop-blur-xl shadow-2xl border border-white/50 rounded-3xl p-8">
        <div class="overflow-hidden rounded-2xl border border-gray-200">
          <table class="tasks-table w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500">
              <tr>
                <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                  Task
                </th>
                <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                  Project
                </th>
                <th class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                  Status
                </th>
                <th class="px-6 py-5 text-right text-xs font-bold text-white uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="task in tasks" :key="task.id" 
                  class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                <td class="px-6 py-5 whitespace-nowrap text-sm font-semibold text-gray-900">
                  {{ task.name }}
                </td>
                <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-700">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 border border-gray-200">
                    {{ task.project?.name || '-' }}
                  </span>
                </td>
                <td class="px-6 py-5 whitespace-nowrap">
                  <span
                    class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wide shadow-lg transform hover:scale-105 transition-all duration-200"
                    :class="{
                      'bg-gradient-to-r from-yellow-400 to-amber-500 text-yellow-900 shadow-yellow-200': task.status === 'pending',
                      'bg-gradient-to-r from-blue-400 to-cyan-500 text-blue-900 shadow-blue-200': task.status === 'in_progress',
                      'bg-gradient-to-r from-emerald-400 to-teal-500 text-emerald-900 shadow-emerald-200': task.status === 'completed'
                    }"
                  >
                    {{ task.status.replace('_', ' ').toUpperCase() }}
                  </span>
                </td>
                <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium space-x-2">
                  <Link :href="`/employee/tasks/${task.id}`" 
                        class="view-btn inline-flex items-center px-4 py-2 border border-transparent rounded-xl font-semibold text-sm shadow-lg transform hover:scale-105 hover:shadow-xl transition-all duration-200 bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    View
                  </Link>
                  <!-- <Link :href="`/employee/tasks/${task.id}/edit`" 
                        class="edit-btn inline-flex items-center px-4 py-2 border border-transparent rounded-xl font-semibold text-sm shadow-lg transform hover:scale-105 hover:shadow-xl transition-all duration-200 bg-gradient-to-r from-emerald-500 to-teal-600 text-white hover:from-emerald-600 hover:to-teal-700">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                  </Link> -->
                </td>
              </tr>
              <tr v-if="tasks.length === 0">
                <td colspan="4" class="px-6 py-20 text-center">
                  <div class="text-gray-500">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No tasks assigned</h3>
                    <p class="text-sm">Get started by completing your first task.</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  tasks: {
    type: Array,
    default: () => []
  }
})
</script>
