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
<div class="min-h-screen bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Tasks</h1>

    <Link href="/manager/tasks/create"
          class="inline-block mb-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
      Create Task
    </Link>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-gray-200 text-gray-700">
            <th class="px-4 py-2 text-left">Name</th>
            <th class="px-4 py-2 text-left">Project</th>
            <th class="px-4 py-2 text-left">Assigned Employee</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id" class="border-t hover:bg-gray-50 transition">
            <td class="px-4 py-2">{{ task.name }}</td>
            <td class="px-4 py-2">{{ task.project?.name || '-' }}</td>
            <td class="px-4 py-2">{{ task.employee?.name || '-' }}</td>
            <td class="px-4 py-2">
              <span class="px-2 py-1 rounded text-sm font-medium"
                    :class="{
                      'bg-yellow-100 text-yellow-700': task.status === 'pending',
                      'bg-blue-100 text-blue-700': task.status === 'in_progress',
                      'bg-green-100 text-green-700': task.status === 'completed'
                    }">
                {{ task.status }}
              </span>
            </td>
            <td class="px-4 py-2 space-x-3">
              <Link :href="`/manager/tasks/${task.id}`" class="text-blue-600 hover:underline">View</Link>
              <Link :href="`/manager/tasks/${task.id}/edit`" class="text-yellow-600 hover:underline">Edit</Link>
              <button @click="deleteTask(task.id)" class="text-red-600 hover:underline">Delete</button>
            </td>
          </tr>
          <tr v-if="tasks.length === 0">
            <td colspan="5" class="text-center py-4">No tasks found.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</template>

<style scoped>
/* Optional: Tailwind styling already applied */
</style>