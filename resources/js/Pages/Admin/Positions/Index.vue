<template>
  <div class="p-8 bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
      <div>
        <h1 class="text-4xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
          Job Positions
        </h1>
        <p class="text-gray-600 text-lg">Manage all organizational positions and salary ranges</p>
      </div>
      <Link
        href="/admin/positions/create"
        class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-1 transition-all duration-300 flex items-center gap-2"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Add New Position
      </Link>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-300">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2-4V7m0 4v10M21 21l-4-4m0 0L17 17m4 4h2m-2 0v-2"></path>
            </svg>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-600 uppercase tracking-wider">Total Positions</p>
            <p class="text-3xl font-black text-gray-900">{{ positions.length }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Table Section -->
    <div v-if="positions.length" class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/50 overflow-hidden">
      <div class="p-8 border-b border-gray-100">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-bold text-gray-800">All Positions</h2>
          <div class="flex items-center gap-2 text-sm text-gray-500">
            <span>{{ positions.length }} positions</span>
          </div>
        </div>
      </div>
      
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b-2 border-gray-200">
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">ID</th>
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Position Title</th>
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Level</th>
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Min Salary</th>
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Max Salary</th>
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Description</th>
              <th class="py-6 px-8 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            <tr 
              v-for="position in positions" 
              :key="position.id" 
              class="group hover:bg-blue-50/50 transition-all duration-200 border-b border-gray-50 last:border-b-0"
            >
              <td class="py-6 px-8 font-mono text-sm font-semibold text-gray-900 bg-gray-50/50 group-hover:bg-gray-100">
                #{{ position.id }}
              </td>
              <td class="py-6 px-8">
                <div class="font-semibold text-lg text-gray-900">{{ position.title }}</div>
                <div class="text-sm text-gray-500 mt-1">{{ position.level }}</div>
              </td>
              <td class="py-6 px-8">
                <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800">
                  {{ position.level }}
                </span>
              </td>
              <td class="py-6 px-8 font-mono text-lg font-bold text-green-600">
                {{ formatCurrency(position.min_salary) }}
              </td>
              <td class="py-6 px-8 font-mono text-lg font-semibold text-blue-600">
                {{ formatCurrency(position.max_salary) }}
              </td>
              <td class="py-6 px-8 max-w-md">
                <p class="text-gray-700 line-clamp-2" :title="position.description">{{ position.description }}</p>
              </td>
              <td class="py-6 px-8">
                <div class="flex items-center gap-3">
                  <Link
                    :href="`/admin/positions/${position.id}/edit`"
                    class="group/edit flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-yellow-500 hover:to-yellow-600 transform hover:-translate-y-0.5 transition-all duration-200"
                  >
                    <svg class="w-4 h-4 group-hover/edit:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.5h3m1.5-3l-3-3m0 0l-3 3m3-3v7.5"></path>
                    </svg>
                    Edit
                  </Link>
                  <button
                    @click="destroy(position.id)"
                    class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl hover:from-red-600 hover:to-red-700 transform hover:-translate-y-0.5 transition-all duration-200"
                  >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Delete
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Empty State -->
    <div v-else class="text-center py-24 px-8">
      <div class="max-w-md mx-auto">
        <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-xl">
          <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2-4V7m0 4v10M21 21l-4-4m0 0L17 17m4 4h2m-2 0v-2"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-2">No positions yet</h3>
        <p class="text-gray-600 mb-8 max-w-sm mx-auto">Get started by creating your first job position. Add titles, salary ranges, and descriptions to organize your team structure.</p>
        <Link
          href="/admin/positions/create"
          class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-4 rounded-2xl font-semibold shadow-xl hover:shadow-2xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-1 transition-all duration-300"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Create First Position
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const { props } = usePage();
const positions = ref(props.positions || []);

function destroy(id) {
  if (confirm('Are you sure you want to delete this position?')) {
    Inertia.delete(`/admin/positions/${id}`, {
      onSuccess: () => {
        positions.value = positions.value.filter(p => p.id !== id);
      },
    });
  }
}

// Format currency helper
function formatCurrency(amount) {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
    minimumFractionDigits: 0,
  }).format(amount);
}
</script>
