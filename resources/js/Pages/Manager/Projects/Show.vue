<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-6">
      <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Project Details</h1>

      <div class="space-y-4">
        <div class="flex justify-between bg-gray-50 px-4 py-2 rounded-lg shadow-sm">
          <span class="font-medium text-gray-700">Name:</span>
          <span class="text-gray-900">{{ project.name }}</span>
        </div>

        <div class="flex justify-between bg-gray-50 px-4 py-2 rounded-lg shadow-sm">
          <span class="font-medium text-gray-700">Description:</span>
          <span class="text-gray-900">{{ project.description || 'N/A' }}</span>
        </div>

        <div class="flex justify-between bg-gray-50 px-4 py-2 rounded-lg shadow-sm">
          <span class="font-medium text-gray-700">Start Date:</span>
          <span class="text-gray-900">{{ project.start_date || 'N/A' }}</span>
        </div>

        <div class="flex justify-between bg-gray-50 px-4 py-2 rounded-lg shadow-sm">
          <span class="font-medium text-gray-700">End Date:</span>
          <span class="text-gray-900">{{ project.end_date || 'N/A' }}</span>
        </div>
      </div>

      <div class="mt-6 flex justify-center space-x-4">
        <Link
          href="/manager/projects"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200"
        >
          Back to Projects
        </Link>

        <Link
          :href="`/manager/projects/${project.id}/edit`"
          class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
        >
          Edit Project
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  project: Object
})
</script>