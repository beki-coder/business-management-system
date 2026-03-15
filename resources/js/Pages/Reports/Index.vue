<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-8">
    <div class="max-w-7xl mx-auto">
      <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-8">
        📊 Project Reports
      </h1>

      <!-- No projects -->
      <div v-if="projects.length === 0" class="text-center py-20">
        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-r from-gray-200 to-gray-300 rounded-3xl flex items-center justify-center shadow-lg">
          <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
          </svg>
        </div>
        <p class="text-xl text-gray-500 font-medium">No projects found</p>
        <p class="text-gray-400 mt-2">Get started by creating your first project</p>
      </div>

      <!-- Projects Grid -->
      <div v-else class="grid gap-6">
        <div v-for="project in projects" :key="project.id" class="group">
          <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-white/50 backdrop-blur-sm">
            <div class="p-8">
              <!-- Header -->
              <div class="flex items-start justify-between mb-6">
                <div>
                  <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 mb-2">
                    {{ project.name }}
                  </h3>
                  <p class="text-gray-600 leading-relaxed max-w-lg">{{ project.description || 'No description available' }}</p>
                </div>
                <div class="flex items-center space-x-2">
                  <span :class="statusBadgeClass(projectStatus(project.tasks || []))" class="px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide">
                    {{ projectStatus(project.tasks || []) }}
                  </span>
                </div>
              </div>

              <!-- Tasks Section -->
              <div class="border-t border-gray-100 pt-6">
                <div class="flex items-center mb-4">
                  <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                  <h4 class="text-lg font-semibold text-gray-900">Tasks</h4>
                </div>
                
                <div v-if="(project.tasks || []).length === 0" class="text-center py-8 bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl">
                  <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                  </svg>
                  <p class="text-gray-500 font-medium">No tasks yet</p>
                </div>

                <div v-else class="space-y-3 max-h-64 overflow-y-auto">
                  <div v-for="task in project.tasks" :key="task.id" class="flex items-center p-4 bg-gradient-to-r from-white to-blue-50/50 rounded-2xl hover:shadow-md transition-all duration-200 group/task">
                    <div class="flex-shrink-0 w-2 h-2 rounded-full mr-4" :class="task.status === 'completed' ? 'bg-green-500' : task.status === 'in_progress' ? 'bg-yellow-500' : 'bg-gray-400'"></div>
                    <div class="flex-1 min-w-0">
                      <p class="font-medium text-gray-900 truncate">{{ task.name }}</p>
                      <span class="inline-block w-2.5 h-2.5 rounded-full mt-1" :class="taskStatusColor(task.status)"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  projects: {
    type: Array,
    default: () => []
  }
})

// Helper to show project status based on tasks
function projectStatus(tasks) {
  if (!tasks.length) return 'No tasks'
  const allCompleted = tasks.every(t => t.status === 'completed')
  const someInProgress = tasks.some(t => t.status === 'in_progress')
  if (allCompleted) return 'Completed'
  if (someInProgress) return 'In Progress'
  return 'Pending'
}

// Status badge styling
function statusBadgeClass(status) {
  const colors = {
    'Completed': 'bg-green-100 text-green-800 border border-green-200',
    'In Progress': 'bg-yellow-100 text-yellow-800 border border-yellow-200',
    'Pending': 'bg-orange-100 text-orange-800 border border-orange-200',
    'No tasks': 'bg-gray-100 text-gray-800 border border-gray-200'
  }
  return colors[status] || 'bg-gray-100 text-gray-800'
}

// Task status color dots
function taskStatusColor(status) {
  const colors = {
    'completed': 'bg-green-500',
    'in_progress': 'bg-yellow-500',
    'pending': 'bg-gray-400'
  }
  return colors[status] || 'bg-gray-400'
}
</script>

<style scoped>
/* Custom scrollbar for tasks */
.max-h-64::-webkit-scrollbar {
  width: 6px;
}
.max-h-64::-webkit-scrollbar-track {
  background: #f1f5f9;
  border-radius: 3px;
}
.max-h-64::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 3px;
}
.max-h-64::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}
</style>
