<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-indigo-100 p-8">
    <!-- Header Card -->
    <div class="max-w-7xl mx-auto">
      <div class="bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl shadow-2xl p-8 mb-8">
        <div class="flex justify-between items-center mb-8">
          <div>
            <h1 class="text-4xl font-black bg-gradient-to-r from-indigo-600 to-purple-700 bg-clip-text text-transparent mb-2">
              Departments
            </h1>
            <p class="text-slate-500 font-medium">Manage your organization departments efficiently</p>
          </div>
          <Link
            href="/admin/departments/create"
            class="group bg-gradient-to-r from-indigo-500 to-blue-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl hover:from-indigo-600 hover:to-blue-700 transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-3"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Add Department</span>
          </Link>
        </div>

        <!-- Departments Table Card -->
        <div v-if="departments.length" class="bg-white/60 backdrop-blur-2xl border border-white/40 rounded-2xl shadow-2xl overflow-hidden">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
              <thead class="bg-gradient-to-r from-indigo-500 to-purple-600">
                <tr>
                  <th class="px-8 py-6 text-left text-xs font-black text-white uppercase tracking-wider">
                    ID
                  </th>
                  <th class="px-8 py-6 text-left text-xs font-black text-white uppercase tracking-wider">
                    Department Name
                  </th>
                  <th class="px-8 py-6 text-left text-xs font-black text-white uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-slate-100">
                <tr 
                  v-for="department in departments" 
                  :key="department.id" 
                  class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-200 group"
                >
                  <td class="px-8 py-6 whitespace-nowrap">
                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-2xl flex items-center justify-center">
                      <span class="text-indigo-700 font-bold text-lg">#{{ department.id }}</span>
                    </div>
                  </td>
                  <td class="px-8 py-6 whitespace-nowrap">
                    <div class="flex items-center space-x-4">
                      <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-8 3h15M4 3h16M4 21h16"></path>
                        </svg>
                      </div>
                      <div>
                        <div class="text-xl font-bold text-slate-900 group-hover:text-indigo-700 transition-colors">{{ department.name }}</div>
                        <div class="text-sm text-slate-500">Department #{{ department.id }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-8 py-6 whitespace-nowrap">
                    <div class="flex items-center space-x-3">
                      <Link
                        :href="`/admin/departments/${department.id}/edit`"
                        class="group/edit bg-gradient-to-r from-amber-400 to-yellow-500 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-amber-500 hover:to-yellow-600 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center space-x-2 text-sm"
                      >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span>Edit</span>
                      </Link>
                      <button
                        @click="destroy(department.id)"
                        class="group/delete bg-gradient-to-r from-red-500 to-rose-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-red-600 hover:to-rose-700 transform hover:-translate-y-0.5 transition-all duration-300 flex items-center space-x-2 text-sm"
                      >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <span>Delete</span>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Empty State -->
        <div v-else class="text-center py-20">
          <div class="w-32 h-32 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-xl">
            <svg class="w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-8 3h15M4 3h16M4 21h16"></path>
            </svg>
          </div>
          <h3 class="text-2xl font-bold text-slate-800 mb-2">No departments yet</h3>
          <p class="text-slate-500 mb-8 max-w-md mx-auto">
            Get started by creating your first department. Organize your teams and streamline operations.
          </p>
          <Link
            href="/admin/departments/create"
            class="bg-gradient-to-r from-indigo-500 to-blue-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl hover:from-indigo-600 hover:to-blue-700 transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center space-x-3"
          >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Create First Department</span>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const { props } = usePage();
const departments = ref(props.departments || []);

function destroy(id) {
  if (confirm('Are you sure you want to delete this department?')) {
    Inertia.delete(`/admin/departments/${id}`, {
      onSuccess: () => {
        departments.value = departments.value.filter(d => d.id !== id);
      },
    });
  }
}
</script>
