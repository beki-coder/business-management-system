<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
  projects: Array
})

function deleteProject(id) {
  if (confirm('Are you sure you want to delete this project?')) {
    router.delete(`/manager/projects/${id}`)
  }
}
</script>

<template>
<div class="container">
  <div class="header">
    <h1>Projects</h1>
    <Link href="/manager/projects/create" class="create-btn">Add Project</Link>
  </div>

  <div class="card">
    <table>
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
          <td>{{ project.start_date || '-' }}</td>
          <td>{{ project.end_date || '-' }}</td>
          <td class="actions">
            <Link :href="`/manager/projects/${project.id}`" class="view-btn">View</Link>
            <Link :href="`/manager/projects/${project.id}/edit`" class="edit-btn">Edit</Link>
            <button @click="deleteProject(project.id)" class="delete-btn">Delete</button>
          </td>
        </tr>
        <tr v-if="projects.length === 0">
          <td colspan="4" class="empty">No projects found.</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</template>

<style scoped>
.container { max-width:900px; margin:auto; padding:20px; font-family:Arial; }
.header { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.create-btn { background:#2563eb; color:white; padding:8px 16px; border-radius:4px; text-decoration:none; }
.card { background:#f9f9f9; padding:20px; border-radius:8px; border:1px solid #ddd; }
table { width:100%; border-collapse:collapse; }
th, td { padding:10px; border-bottom:1px solid #ddd; text-align:left; }
th { background:#f1f1f1; }
.actions { display:flex; gap:8px; }
.view-btn { background:#2563eb; color:white; padding:5px 10px; border-radius:4px; text-decoration:none; }
.edit-btn { background:#10b981; color:white; padding:5px 10px; border-radius:4px; text-decoration:none; }
.delete-btn { background:#dc2626; color:white; padding:5px 10px; border:none; border-radius:4px; cursor:pointer; }
.empty { text-align:center; padding:20px; }
</style>