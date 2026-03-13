<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Projects</h1>
        <Link
          href="/manager/projects/create"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200"
        >
          Create Project
        </Link>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
          <thead class="bg-gray-200 text-gray-700">
            <tr>
              <th class="px-4 py-2 text-left">Name</th>
              <th class="px-4 py-2 text-left">Start Date</th>
              <th class="px-4 py-2 text-left">End Date</th>
              <th class="px-4 py-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="project in projects"
              :key="project.id"
              class="border-b hover:bg-gray-50 transition-colors duration-150"
            >
              <td class="px-4 py-2">{{ project.name }}</td>
              <td class="px-4 py-2">{{ project.start_date || 'N/A' }}</td>
              <td class="px-4 py-2">{{ project.end_date || 'N/A' }}</td>
              <td class="px-4 py-2 space-x-2">
                <Link
                  :href="`/manager/projects/${project.id}`"
                  class="text-blue-600 hover:underline"
                >
                  View
                </Link>
                |
                <Link
                  :href="`/manager/projects/${project.id}/edit`"
                  class="text-yellow-600 hover:underline"
                >
                  Edit
                </Link>
              </td>
            </tr>

            <tr v-if="projects.length === 0">
              <td colspan="4" class="text-center py-4 text-gray-500">
                No Projects Found
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  projects: Array
})
</script>