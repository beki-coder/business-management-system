<template>
  <div>
    <h1>Employees</h1>

    <Link href="/admin/employees/create">Create Employee</Link>

    <table border="1">
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

          <td>
            <Link :href="`/admin/employees/${employee.id}`">View</Link> |

            <Link :href="`/admin/employees/${employee.id}/edit`">Edit</Link> |

            <button @click="deleteEmployee(employee.id)">
              Delete
            </button>
          </td>
        </tr>

        <tr v-if="employees.length === 0">
          <td colspan="3">No Employees Found</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  employees: Array
})

function deleteEmployee(id) {
  if (confirm('Delete this employee?')) {
    router.delete(`/admin/employees/${id}`)
  }
}
</script>