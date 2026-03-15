<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
  tasks: Array
})

function deleteTask(id) {
  if (confirm('Are you sure you want to delete this task?')) {
    router.delete(`/manager/tasks/${id}`)
  }
}
</script>

<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-8">
    <!-- Animated floating card -->
    <div class="max-w-7xl mx-auto bg-white/80 backdrop-blur-xl shadow-2xl rounded-3xl p-8 border border-white/50">
      
      <!-- Header with gradient and glass effect -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-8 pb-8 border-b border-gray-100">
        <div>
          <h1 class="text-4xl sm:text-5xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent drop-shadow-lg">
            Task Dashboard
          </h1>
          <p class="text-gray-600 mt-2 font-medium">Manage your projects efficiently</p>
        </div>
        
        <!-- Enhanced Create Button with glassmorphism -->
        <Link href="/manager/tasks/create"
              class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border border-blue-500/30 backdrop-blur-sm">
          <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Create New Task
        </Link>
      </div>

      <!-- Enhanced responsive table with modern styling -->
      <div class="overflow-hidden rounded-2xl border border-gray-200/50 shadow-lg bg-white/50 backdrop-blur-sm">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200/30">
            <thead class="bg-gradient-to-r from-gray-50 to-blue-50/50 sticky top-0 z-10 backdrop-blur-sm">
              <tr>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-100 last:border-r-0">
                  Task Name
                </th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-100 last:border-r-0">
                  Project
                </th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-100 last:border-r-0">
                  Employee
                </th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-100 last:border-r-0">
                  Status
                </th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white/70">
              <tr v-for="task in tasks" :key="task.id" 
                  class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group/task">
                <td class="px-8 py-6 font-medium text-gray-900 border-r border-gray-100 group-hover/task:text-blue-900">
                  {{ task.name }}
                </td>
                <td class="px-8 py-6 text-gray-700 font-medium border-r border-gray-100">
                  {{ task.project?.name || '-' }}
                </td>
                <td class="px-8 py-6 text-gray-700 font-medium border-r border-gray-100">
                  {{ task.employee?.name || '-' }}
                </td>
                <td class="px-8 py-6 border-r border-gray-100">
                  <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold ring-2 ring-inset shadow-md transform hover:scale-105 transition-all duration-200"
                        :class="{
                          'bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800 ring-yellow-200 shadow-yellow-200': task.status === 'pending',
                          'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 ring-blue-200 shadow-blue-200': task.status === 'in_progress',
                          'bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 ring-emerald-200 shadow-emerald-200': task.status === 'completed'
                        }">
                    {{ task.status.replace('_', ' ').toUpperCase() }}
                  </span>
                </td>
                <td class="px-8 py-6">
                  <div class="flex items-center space-x-3">
                    <!-- View Button -->
                    <Link :href="`/manager/tasks/${task.id}`" 
                          class="group/btn inline-flex items-center px-4 py-2 text-sm font-semibold text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-xl hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-200 border border-blue-200/50">
                      <svg class="w-4 h-4 mr-1 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                      View
                    </Link>
                    
                    <!-- Edit Button -->
                    <Link :href="`/manager/tasks/${task.id}/edit`" 
                          class="group/btn inline-flex items-center px-4 py-2 text-sm font-semibold text-amber-700 bg-amber-100 hover:bg-amber-200 rounded-xl hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-200 border border-amber-200/50">
                      <svg class="w-4 h-4 mr-1 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                      </svg>
                      Edit
                    </Link>
                    
                    <!-- Delete Button -->
                    <button @click="deleteTask(task.id)" 
                            class="group/btn inline-flex items-center px-4 py-2 text-sm font-semibold text-red-700 bg-red-100 hover:bg-red-200 rounded-xl hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-200 border border-red-200/50">
                      <svg class="w-4 h-4 mr-1 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
              <tr v-if="tasks.length === 0" class="w-full">
                <td colspan="5" class="text-center py-20">
                  <div class="flex flex-col items-center space-y-4">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-3xl flex items-center justify-center shadow-lg">
                      <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                      </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-500">No tasks yet</h3>
                    <p class="text-gray-400 max-w-md">Get started by creating your first task above.</p>
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
