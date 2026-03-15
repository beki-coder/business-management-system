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
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  min-height: 100vh;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 3rem;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  padding: 2rem 2.5rem;
  border-radius: 24px;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

.header h1 {
  font-size: 2.5rem;
  font-weight: 800;
  background: linear-gradient(135deg, #667eea, #764ba2);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin: 0;
}

.create-btn {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 1rem 2rem;
  border-radius: 16px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1rem;
  box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border: none;
}

.create-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 20px 40px rgba(102, 126, 234, 0.6);
}

.card {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  padding: 2.5rem;
  border-radius: 24px;
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
}

th, td {
  padding: 1.5rem 1rem;
  text-align: left;
  font-size: 0.95rem;
}

th {
  background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
  font-weight: 700;
  color: #334155;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-size: 0.8rem;
  border: none;
}

tbody tr {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 16px;
  overflow: hidden;
  backdrop-filter: blur(10px);
}

tbody tr:hover {
  transform: translateY(-4px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.9);
}

tbody tr td {
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

tbody tr:last-child td {
  border-bottom: none;
}

.actions {
  display: flex;
  gap: 0.75rem;
}

.view-btn, .edit-btn, .delete-btn {
  padding: 0.75rem 1.5rem;
  border-radius: 12px;
  font-weight: 600;
  font-size: 0.85rem;
  text-decoration: none;
  border: none;
  cursor: pointer;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.view-btn {
  background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
  color: white;
  box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
}

.view-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(59, 130, 246, 0.4);
}

.edit-btn {
  background: linear-gradient(135deg, #10b981 0%, #059669 100%);
  color: white;
  box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
}

.edit-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(16, 185, 129, 0.4);
}

.delete-btn {
  background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
  color: white;
  box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
}

.delete-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 15px 35px rgba(239, 68, 68, 0.4);
}

.empty {
  text-align: center;
  padding: 4rem 2rem;
  color: #64748b;
  font-size: 1.1rem;
  font-weight: 500;
}

@media (max-width: 768px) {
  .container {
    padding: 1rem;
  }
  
  .header {
    flex-direction: column;
    gap: 1.5rem;
    text-align: center;
  }
  
  .actions {
    flex-direction: column;
  }
  
  .view-btn, .edit-btn, .delete-btn {
    width: 100%;
  }
}
</style>
