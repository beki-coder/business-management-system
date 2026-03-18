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
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-4xl mx-auto">
    <div class="header mb-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent drop-shadow-lg">Employees</h1>
        <p class="text-gray-600 mt-2 font-medium">Manage your team members</p>
      </div>
      <Link href="/admin/employees/create" class="create-btn inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold text-lg rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border border-transparent hover:border-blue-500">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add Employee
      </Link>
    </div>

    <div class="card bg-white/80 backdrop-blur-xl shadow-2xl border border-white/50 rounded-3xl p-8 lg:p-12">
      <div class="overflow-hidden">
        <table class="w-full">
          <thead>
            <tr class="bg-gradient-to-r from-slate-100 to-slate-200/50">
              <th class="px-6 py-5 text-left text-xs font-bold text-slate-700 uppercase tracking-wider rounded-tl-2xl">Name</th>
              <th class="px-6 py-5 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Email</th>
              <th class="px-6 py-5 text-left text-xs font-bold text-slate-700 uppercase tracking-wider rounded-tr-2xl">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-200">
            <tr v-for="employee in employees" :key="employee.id" class="hover:bg-slate-50/50 transition-all duration-200 group">
              <td class="px-6 py-6 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                    <span class="text-white font-bold text-lg">{{ employee.name.charAt(0).toUpperCase() }}</span>
                  </div>
                  <div>
                    <div class="text-xl font-semibold text-slate-900 group-hover:text-blue-700 transition-colors">{{ employee.name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-6 whitespace-nowrap">
                <div class="text-slate-900 font-medium bg-slate-100 px-4 py-2 rounded-xl border border-slate-200">{{ employee.email }}</div>
              </td>
              <td class="px-6 py-6 whitespace-nowrap">
                <div class="actions flex gap-3">
                  <Link :href="`/admin/employees/${employee.id}`" class="view-btn group-hover:scale-105 transition-all duration-200 flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-medium rounded-xl shadow-lg hover:shadow-xl border border-transparent hover:border-indigo-500">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    View
                  </Link>
                  <Link :href="`/admin/employees/${employee.id}/edit`" class="edit-btn group-hover:scale-105 transition-all duration-200 flex items-center px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-medium rounded-xl shadow-lg hover:shadow-xl border border-transparent hover:border-emerald-500">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit
                  </Link>
                  <button @click="deleteEmployee(employee.id)" class="delete-btn group-hover:scale-105 transition-all duration-200 flex items-center px-5 py-2.5 bg-gradient-to-r from-rose-500 to-red-600 hover:from-rose-600 hover:to-red-700 text-white font-medium rounded-xl shadow-lg hover:shadow-xl border border-transparent hover:border-rose-500">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Delete
                  </button>
                </div>
              </td>
            </tr>
            <tr v-if="employees.length === 0">
              <td colspan="3" class="empty py-20 text-center">
                <div class="w-24 h-24 bg-gradient-to-br from-slate-200 to-slate-300 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-xl">
                  <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-600 mb-2">No employees found</h3>
                <p class="text-slate-500 text-lg">Get started by adding your first employee.</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>
.view-btn:hover, .edit-btn:hover, .delete-btn:hover, .create-btn:hover {
  transform: translateY(-2px);
}
</style>
