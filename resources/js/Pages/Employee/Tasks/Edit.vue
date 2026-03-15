<template>
  <div class="container max-w-lg mx-auto p-6 bg-white shadow-lg rounded-xl">
    <h1 class="text-2xl font-semibold mb-6">Update Task</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block font-medium mb-1">Status</label>
        <select v-model="form.status" class="w-full border border-gray-300 rounded-lg px-4 py-2">
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <div>
        <label class="block font-medium mb-1">Description</label>
        <textarea v-model="form.description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2"></textarea>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">
        Update Task
      </button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  task: Object
})

const form = useForm({
  status: props.task.status,
  description: props.task.description || ''
})

function submit() {
  form.put(`/employee/tasks/${props.task.id}`)
}
</script>

<style scoped>
.container {
  font-family: Arial, sans-serif;
}
</style>