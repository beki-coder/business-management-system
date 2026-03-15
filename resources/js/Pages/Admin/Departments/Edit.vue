<template>
  <div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Department</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block font-medium mb-1">Name</label>
        <input
          v-model="form.name"
          type="text"
          class="w-full border rounded px-3 py-2"
        />
        <p v-if="errors.name" class="text-red-500 text-sm mt-1">{{ errors.name }}</p>
      </div>

      <div class="flex space-x-2">
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
          Update
        </button>
        <Link
          href="/admin/departments"
          class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500"
        >
          Cancel
        </Link>
      </div>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage, Link } from '@inertiajs/vue3';

const { props } = usePage();
const department = props.department;

const form = reactive({
  name: department.name,
});

const errors = reactive(props.errors || {});

function submit() {
  Inertia.put(`/admin/departments/${department.id}`, form);
}
</script>