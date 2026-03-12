<template>
  <div>
    <h1>Task Details</h1>
    <p><strong>Name:</strong> {{ task.name }}</p>
    <p><strong>Project:</strong> {{ task.project.name }}</p>
    <p><strong>Status:</strong> {{ task.status }}</p>
    <p><strong>Description:</strong> {{ task.description }}</p>
    <p><strong>Assigned To:</strong> {{ task.assignedTo.name }}</p>
    <Link href="/employee/tasks">Back to My Tasks</Link>
  </div>
</template>

<script setup>
const props = defineProps({
  task: Object
})
</script>