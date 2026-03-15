<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-indigo-100 p-8">
    <!-- Header with Glass Effect -->
    <div class="max-w-7xl mx-auto">
      <div class="flex justify-between items-center mb-8 backdrop-blur-md bg-white/80 border border-white/50 rounded-2xl p-6 shadow-2xl">
        <div class="flex items-center space-x-4">
          <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
          </div>
          <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">Companies</h1>
            <p class="text-sm text-gray-500 font-medium">{{ companies.length }} companies</p>
          </div>
        </div>
        <Link
          href="/admin/companies/create"
          class="group bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-blue-600 hover:to-blue-700 transform hover:-translate-y-1 transition-all duration-200 flex items-center space-x-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          <span>Add Company</span>
        </Link>
      </div>

      <!-- Enhanced Companies Table with Card Design -->
      <div v-if="companies.length" class="backdrop-blur-md bg-white/90 border border-white/50 rounded-3xl shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
              <tr>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Company Name</th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Description</th>
                <th class="px-8 py-5 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr
                v-for="company in companies"
                :key="company.id"
                class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group"
              >
                <td class="px-8 py-6 whitespace-nowrap">
                  <span class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-md">
                    {{ company.id }}
                  </span>
                </td>
                <td class="px-8 py-6 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center mr-4 shadow-lg">
                      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                      </svg>
                    </div>
                    <div>
                      <div class="text-lg font-bold text-gray-900 group-hover:text-blue-700 transition-colors">{{ company.name }}</div>
                      <div class="text-sm text-gray-500">Active</div>
                    </div>
                  </div>
                </td>
                <td class="px-8 py-6 max-w-md">
                  <p class="text-gray-700 line-clamp-2 leading-relaxed">{{ company.description }}</p>
                </td>
                <td class="px-8 py-6 whitespace-nowrap text-sm font-medium space-x-3">
                  <!-- Edit Button -->
                  <Link
                    :href="`/admin/companies/${company.id}/edit`"
                    class="group/edit flex items-center space-x-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-yellow-500 hover:to-yellow-600 transform hover:-translate-y-0.5 transition-all duration-200"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.5h3m1.5-3l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <span>Edit</span>
                  </Link>

                  <!-- Delete Button -->
                  <button
                    @click="destroy(company.id)"
                    class="group/delete flex items-center space-x-2 bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-red-600 hover:to-red-700 transform hover:-translate-y-0.5 transition-all duration-200"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    <span>Delete</span>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Enhanced Empty State -->
      <div v-else class="text-center py-24 backdrop-blur-md bg-white/60 border-2 border-dashed border-gray-200 rounded-3xl shadow-xl">
        <div class="w-24 h-24 bg-gradient-to-br from-gray-200 to-gray-300 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-lg">
          <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-700 mb-2">No companies yet</h3>
        <p class="text-gray-500 mb-8 max-w-md mx-auto">Get started by creating your first company. It's quick and easy.</p>
        <Link
          href="/admin/companies/create"
          class="inline-flex bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl hover:from-blue-600 hover:to-blue-700 transform hover:-translate-y-1 transition-all duration-200"
        >
          Create First Company
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';

const { props } = usePage();
const companies = ref(props.companies);

// Delete company
function destroy(id) {
  if (confirm('Are you sure you want to delete this company?')) {
    Inertia.delete(`/admin/companies/${id}`, {
      onSuccess: () => {
        // Remove company from local state after deletion
        companies.value = companies.value.filter(c => c.id !== id);
      },
    });
  }
}
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
