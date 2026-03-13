<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-md p-6">
      <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Employee</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label class="block text-gray-700 font-medium mb-1">Name</label>
          <input
            v-model="form.name"
            type="text"
            placeholder="Enter full name"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Email</label>
          <input
            v-model="form.email"
            type="email"
            placeholder="Enter email address"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        <button
          type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition-colors duration-200"
        >
          Update
        </button>
      </form>

      <div class="mt-4 text-center">
        <Link
          href="/admin/employees"
          class="text-blue-600 hover:underline"
        >
          Back to Employees
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  employee: Object
})

const form = reactive({
  name: props.employee.name,
  email: props.employee.email
})

function submit() {
  router.put(`/admin/employees/${props.employee.id}`, form)
}
</script>