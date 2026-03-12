<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Reports</h1>

    <!-- No projects -->
    <p v-if="projects.length === 0">No projects found.</p>

    <!-- Projects Table -->
    <table v-else class="w-full border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-200">
          <th class="border px-4 py-2">Project Name</th>
          <th class="border px-4 py-2">Description</th>
          <th class="border px-4 py-2">Tasks</th>
          <th class="border px-4 py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="project in projects" :key="project.id">
          <td class="border px-4 py-2">{{ project.name }}</td>
          <td class="border px-4 py-2">{{ project.description || 'N/A' }}</td>
          <td class="border px-4 py-2">
            <ul>
              <li v-for="task in project.tasks || []" :key="task.id">
                {{ task.name }} - {{ task.status }}
              </li>
              <li v-if="(project.tasks || []).length === 0">No tasks</li>
            </ul>
          </td>
          <td class="border px-4 py-2">
            {{ projectStatus(project.tasks || []) }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  projects: {
    type: Array,
    default: () => [] // Default empty array to prevent undefined errors
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
</script>

<style scoped>
table {
  border-collapse: collapse;
}
th, td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: left;
}
</style>