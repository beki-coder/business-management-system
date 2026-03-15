<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
  employees: Array
})

function deleteEmployee(id) {
  if (confirm('Are you sure you want to delete this employee?')) {
    router.delete(`/admin/employees/${id}`)
  }
}
</script>

<template>
<div class="container">
  <div class="header">
    <h1>Employees</h1>
    <Link href="/admin/employees/create" class="create-btn">Add Employee</Link>
  </div>

  <div class="card">
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="employee in employees" :key="employee.id">
          <td>{{ employee.name }}</td>
          <td>{{ employee.email }}</td>
          <td class="actions">
            <Link :href="`/admin/employees/${employee.id}`" class="view-btn">View</Link>
            <Link :href="`/admin/employees/${employee.id}/edit`" class="edit-btn">Edit</Link>
            <button @click="deleteEmployee(employee.id)" class="delete-btn">Delete</button>
          </td>
        </tr>
        <tr v-if="employees.length === 0">
          <td colspan="3" class="empty">No employees found.</td>
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