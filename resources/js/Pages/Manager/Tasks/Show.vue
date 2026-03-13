<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    
    <div class="bg-white shadow-lg rounded-xl w-full max-w-xl p-6">

      <h1 class="text-2xl font-semibold text-gray-800 mb-6">Task Details</h1>

      <p class="mb-2"><strong class="text-gray-700">Name:</strong> {{ task.name }}</p>

      <p class="mb-2"><strong class="text-gray-700">Project:</strong> {{ task.project.name }}</p>

      <p class="mb-2">
        <strong class="text-gray-700">Description:</strong>
        {{ task.description || 'N/A' }}
      </p>

      <p class="mb-2">
        <strong class="text-gray-700">Start Date:</strong>
        {{ task.start_date || 'N/A' }}
      </p>

      <p class="mb-2">
        <strong class="text-gray-700">Due Date:</strong>
        {{ task.due_date || 'N/A' }}
      </p>

      <p class="mb-4">
        <strong class="text-gray-700">Status:</strong>
        <span
          class="px-2 py-1 rounded text-sm font-medium"
          :class="{
            'bg-yellow-100 text-yellow-700': task.status === 'pending',
            'bg-blue-100 text-blue-700': task.status === 'in_progress',
            'bg-green-100 text-green-700': task.status === 'completed'
          }"
        >
          {{ task.status }}
        </span>
      </p>

      <div style="margin-top:20px;" class="flex gap-4">

        <Link
          href="/manager/tasks"
          class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition"
        >
          Back to Tasks
        </Link>

        <Link
          :href="`/manager/tasks/${task.id}/edit`"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition"
        >
          Edit Task
        </Link>

      </div>

    </div>

  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  task: Object
})
</script>