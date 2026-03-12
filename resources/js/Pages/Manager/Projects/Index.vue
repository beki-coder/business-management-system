<template>
  <div>
    <h1>Projects</h1>
    <Link href="/manager/projects/create">Create Project</Link>

    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="project in projects" :key="project.id">
          <td>{{ project.name }}</td>
          <td>{{ project.start_date || 'N/A' }}</td>
          <td>{{ project.end_date || 'N/A' }}</td>
          <td>
            <Link :href="`/manager/projects/${project.id}`">View</Link>
            <Link :href="`/manager/projects/${project.id}/edit`">Edit</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  projects: Array
})
</script>