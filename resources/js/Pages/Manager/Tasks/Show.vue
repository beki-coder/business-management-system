<template>
  <div>
    <h1>Task Details</h1>

    <p><strong>Name:</strong> {{ task.name }}</p>
    <p><strong>Project:</strong> {{ task.project.name }}</p>
    <p><strong>Description:</strong> {{ task.description || 'N/A' }}</p>
    <p><strong>Start Date:</strong> {{ task.start_date || 'N/A' }}</p>
    <p><strong>Due Date:</strong> {{ task.due_date || 'N/A' }}</p>
    <p><strong>Status:</strong> {{ task.status }}</p>

    <div style="margin-top:20px;">
      <Link href="/manager/tasks">Back to Tasks</Link>
      |
      <Link :href="`/manager/tasks/${task.id}/edit`">Edit Task</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  task: Object
})
</script>