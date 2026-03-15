<template>
  <div class="p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Departments</h1>
      <Link
        href="/admin/departments/create"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Add Department
      </Link>
    </div>

    <div v-if="departments.length" class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-lg shadow">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="department in departments" :key="department.id" class="hover:bg-gray-50">
            <td class="py-2 px-4 border-b">{{ department.id }}</td>
            <td class="py-2 px-4 border-b">{{ department.name }}</td>
            <td class="py-2 px-4 border-b space-x-2">
              <Link
                :href="`/admin/departments/${department.id}/edit`"
                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500"
              >
                Edit
              </Link>
              <button
                @click="destroy(department.id)"
                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-else class="text-gray-500">
      No departments found.
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