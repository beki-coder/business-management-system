<template>
  <div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Company</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <!-- Name -->
      <div>
        <label class="block font-medium mb-1">Name</label>
        <input
          v-model="form.name"
          type="text"
          class="w-full border rounded px-3 py-2"
        />
        <p v-if="errors.name" class="text-red-500 text-sm mt-1">{{ errors.name[0] }}</p>
      </div>

      <!-- Description -->
      <div>
        <label class="block font-medium mb-1">Description</label>
        <textarea
          v-model="form.description"
          class="w-full border rounded px-3 py-2"
        ></textarea>
        <p v-if="errors.description" class="text-red-500 text-sm mt-1">{{ errors.description[0] }}</p>
      </div>

      <!-- Buttons -->
      <div class="flex space-x-2">
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
          Update
        </button>

        <Link
          href="/admin/companies"
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
import { Inertia, Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const company = props.company;

// reactive form
const form = reactive({
  name: company.name,
  description: company.description,
});

// errors from the server
const errors = props.errors || {};

// submit form
function submit() {
  Inertia.put(`/admin/companies/${company.id}`, form, {
    onError: (error) => {
      console.log(error);
    },
    preserveState: true,
  });
}
</script>