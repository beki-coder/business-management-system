<template>
  <div class="p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Users</h1>
      <!-- Correct Link import from Inertia -->
      <Link
        :href="route('users.create')"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Add User
      </Link>
    </div>

    <div v-if="usersList.length" class="overflow-x-auto">
      <table class="min-w-full bg-white border rounded-lg shadow">
        <thead class="bg-gray-100">
          <tr>
            <th class="py-2 px-4 border-b">ID</th>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Department</th>
            <th class="py-2 px-4 border-b">Position</th>
            <th class="py-2 px-4 border-b">Role</th>
            <th class="py-2 px-4 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in usersList" :key="user.id" class="hover:bg-gray-50">
            <td class="py-2 px-4 border-b">{{ user.id }}</td>
            <td class="py-2 px-4 border-b">{{ user.name }}</td>
            <td class="py-2 px-4 border-b">{{ user.email }}</td>
            <td class="py-2 px-4 border-b">{{ user.department?.name || '-' }}</td>
            <td class="py-2 px-4 border-b">{{ user.position?.title || '-' }}</td>
            <td class="py-2 px-4 border-b">{{ user.roles[0]?.name || '-' }}</td>
            <td class="py-2 px-4 border-b space-x-2">
              <Link
                :href="route('users.edit', user.id)"
                class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500"
              >
                Edit
              </Link>
              <button
                @click="destroy(user.id)"
                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-else class="text-gray-500">No users found.</div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const { props } = usePage();
const usersList = ref(props.users || []); // Fallback to empty array

function destroy(id) {
  if (confirm('Are you sure you want to delete this user?')) {
    Inertia.delete(route('users.destroy', id), {
      onSuccess: () => {
        usersList.value = usersList.value.filter(u => u.id !== id);
      }
    });
  }
}
</script>