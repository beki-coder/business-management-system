<template>
  <div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Add Position</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block font-medium mb-1">Title</label>
        <input v-model="form.title" type="text" class="w-full border rounded px-3 py-2" />
        <p v-if="errors.title" class="text-red-500 text-sm mt-1">{{ errors.title }}</p>
      </div>

      <div>
        <label class="block font-medium mb-1">Level</label>
        <input v-model="form.level" type="text" class="w-full border rounded px-3 py-2" />
        <p v-if="errors.level" class="text-red-500 text-sm mt-1">{{ errors.level }}</p>
      </div>

      <div>
        <label class="block font-medium mb-1">Min Salary</label>
        <input v-model="form.min_salary" type="number" class="w-full border rounded px-3 py-2" />
      </div>

      <div>
        <label class="block font-medium mb-1">Max Salary</label>
        <input v-model="form.max_salary" type="number" class="w-full border rounded px-3 py-2" />
      </div>

      <div>
        <label class="block font-medium mb-1">Description</label>
        <textarea v-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
      </div>

      <div class="flex space-x-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Save
        </button>
        <Link href="/admin/positions" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
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

const form = reactive({
  title: '',
  level: '',
  min_salary: '',
  max_salary: '',
  description: '',
});

const errors = reactive(props.errors || {});

function submit() {
  Inertia.post('/admin/positions', form);
}
</script>