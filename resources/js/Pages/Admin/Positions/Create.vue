<template>
  <div class="p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Positions</h1>
      <Link
        href="/admin/positions/create"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Add Position
      </Link>
    </div>

    <div v-if="positions.length" class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-lg shadow">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Title</th>
            <th class="py-2 px-4 border-b">Level</th>
            <th class="py-2 px-4 border-b">Min Salary</th>
            <th class="py-2 px-4 border-b">Max Salary</th>
            <th class="py-2 px-4 border-b">Description</th>
            <th class="py-2 px-4 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="position in positions" :key="position.id" class="hover:bg-gray-50">
            <td class="py-2 px-4 border-b">{{ position.id }}</td>
            <td class="py-2 px-4 border-b">{{ position.title }}</td>
            <td class="py-2 px-4 border-b">{{ position.level }}</td>
            <td class="py-2 px-4 border-b">{{ position.min_salary }}</td>
            <td class="py-2 px-4 border-b">{{ position.max_salary }}</td>
            <td class="py-2 px-4 border-b">{{ position.description }}</td>
            <td class="py-2 px-4 border-b space-x-2">
              <Link
                :href="`/admin/positions/${position.id}/edit`"
                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500"
              >
                Edit
              </Link>
              <button
                @click="destroy(position.id)"
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
      No positions found.
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
</script>