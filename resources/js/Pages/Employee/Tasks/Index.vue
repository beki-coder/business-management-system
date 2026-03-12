<template>
  <div>
    <h1>My Tasks</h1>

    <table border="1">
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
          <td>{{ task.project.name }}</td>
          <td>{{ task.status }}</td>
          <td>
            <Link :href="`/employee/tasks/${task.id}`">View</Link>
            <Link :href="`/employee/tasks/${task.id}/edit`">Edit</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  tasks: Array
})
</script>