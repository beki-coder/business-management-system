<template>
  <div class="container">
    <h1>My Tasks</h1>

    <table class="tasks-table">
      <thead>
        <tr>
          <th>Task</th>
          <th>Project</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id">
          <td>{{ task.name }}</td>
          <td>{{ task.project?.name || '-' }}</td>
          <td>{{ task.status }}</td>
          <td>
            <Link :href=" `/employee/tasks/${task.id}`" class="view-btn">View</Link>
            <Link :href=" `/employee/tasks/${task.id}/edit`" class="edit-btn">Edit</Link>
          </td>
        </tr>
        <tr v-if="tasks.length === 0">
          <td colspan="4">No tasks assigned.</td>
        </tr>
      </tbody>
    </table>
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

<style scoped>
.container {
  max-width: 900px;
  margin: auto;
  padding: 20px;
  font-family: Arial, sans-serif;
}

.tasks-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.tasks-table th,
.tasks-table td {
  padding: 10px;
  border: 1px solid #ccc;
  text-align: left;
}

.tasks-table th {
  background-color: #f0f0f0;
}

.view-btn,
.edit-btn {
  padding: 5px 10px;
  border-radius: 4px;
  text-decoration: none;
  color: white;
  margin-right: 5px;
}

.view-btn {
  background-color: #2563eb;
}

.view-btn:hover {
  background-color: #1e40af;
}

.edit-btn {
  background-color: #10b981;
}

.edit-btn:hover {
  background-color: #047857;
}
</style>