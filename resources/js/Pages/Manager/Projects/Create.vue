<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-lg p-6">
      <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Create Project</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="block text-gray-700 font-medium mb-1">Name</label>
          <input
            type="text"
            v-model="form.name"
            placeholder="Enter project name"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Description</label>
          <textarea
            v-model="form.description"
            placeholder="Enter project description"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            rows="4"
          ></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">Start Date</label>
            <input
              type="date"
              v-model="form.start_date"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">End Date</label>
            <input
              type="date"
              v-model="form.end_date"
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
          </div>
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition-colors duration-200"
        >
          Create Project
        </button>
      </form>

      <div class="mt-4 text-center">
        <Link
          href="/manager/projects"
          class="text-blue-600 hover:underline"
        >
          Back to Projects
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  description: '',
  start_date: '',
  end_date: ''
})

function submit() {
  form.post('/manager/projects')
}
</script>