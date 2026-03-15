<template>
  <div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Companies</h1>
      <Link
        href="/admin/companies/create"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Add Company
      </Link>
    </div>

    <!-- Companies Table -->
    <div v-if="companies.length" class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-lg shadow">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Description</th>
            <th class="py-2 px-4 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="company in companies"
            :key="company.id"
            class="hover:bg-gray-50"
          >
            <td class="py-2 px-4 border-b">{{ company.id }}</td>
            <td class="py-2 px-4 border-b">{{ company.name }}</td>
            <td class="py-2 px-4 border-b">{{ company.description }}</td>
            <td class="py-2 px-4 border-b space-x-2">
              <!-- Edit Button -->
              <Link
                :href="`/admin/companies/${company.id}/edit`"
                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500"
              >
                Edit
              </Link>

              <!-- Delete Button -->
              <button
                @click="destroy(company.id)"
                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Empty State -->
    <div v-else class="text-gray-500">
      No companies found.
    </div>
  </div>
</template>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3'; // <-- IMPORTANT: Import Link

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