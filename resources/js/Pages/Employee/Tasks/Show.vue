<template>
  <div class="container max-w-lg mx-auto p-6 bg-white shadow-lg rounded-xl">
    <h1 class="text-2xl font-semibold mb-4">Task Details</h1>

    <div class="space-y-3">
      <p><strong>Name:</strong> {{ task.name }}</p>
      <p><strong>Project:</strong> {{ task.project?.name || 'N/A' }}</p>
      <p><strong>Assigned To:</strong> {{ task.assignedTo?.name || 'N/A' }}</p>
      <p>
        <strong>Status:</strong>
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
      <p><strong>Description:</strong> {{ task.description || 'N/A' }}</p>
      <p><strong>Start Date:</strong> {{ task.start_date || 'N/A' }}</p>
      <p><strong>Due Date:</strong> {{ task.due_date || 'N/A' }}</p>
    </div>

    <div class="mt-6 flex gap-4">
      <Link href="/employee/tasks" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
        Back to My Tasks
      </Link>
      <!-- <Link :href="`/employee/tasks/${task.id}/edit`" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Edit Task
      </Link> -->
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  task: Object
})
</script>

<style scoped>
.container {
  font-family: Arial, sans-serif;
}
</style>