<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-6">
      <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Employee Details</h1>

      <div class="space-y-4">
        <div class="flex justify-between bg-gray-50 px-4 py-2 rounded-lg shadow-sm">
          <span class="font-medium text-gray-700">Name:</span>
          <span class="text-gray-900">{{ employee.name }}</span>
        </div>

        <div class="flex justify-between bg-gray-50 px-4 py-2 rounded-lg shadow-sm">
          <span class="font-medium text-gray-700">Email:</span>
          <span class="text-gray-900">{{ employee.email }}</span>
        </div>
      </div>

      <div class="mt-6 text-center">
        <Link
          href="/admin/employees"
          class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors duration-200"
        >
          Back to Employees
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  employee: Object
})
</script>