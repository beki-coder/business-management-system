<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  task: Object,
  projects: Array,
  employees: Array
})

const form = useForm({
  name: props.task.name,
  project_id: props.task.project_id,
  employee_id: props.task.employee_id,
  description: props.task.description,
  start_date: props.task.start_date,
  due_date: props.task.due_date,
  status: props.task.status
})

function submit() {
  form.put(`/manager/tasks/${props.task.id}`)
}
</script>

<template>
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
  <div class="bg-white shadow-lg rounded-xl w-full max-w-xl p-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Task</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block text-gray-700 font-medium mb-1">Task Name</label>
        <input type="text" v-model="form.name" class="w-full border border-gray-300 rounded-lg px-4 py-2" />
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Project</label>
        <select v-model="form.project_id" class="w-full border border-gray-300 rounded-lg px-4 py-2">
          <option value="" disabled>Select Project</option>
          <option v-for="project in projects" :key="project.id" :value="project.id">{{ project.name }}</option>
        </select>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Assign Employee</label>
        <select v-model="form.employee_id" class="w-full border border-gray-300 rounded-lg px-4 py-2">
          <option value="" disabled>Select Employee</option>
          <option v-for="employee in employees" :key="employee.id" :value="employee.id">{{ employee.name }}</option>
        </select>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Description</label>
        <textarea v-model="form.description" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2"></textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-medium mb-1">Start Date</label>
          <input type="date" v-model="form.start_date" class="w-full border border-gray-300 rounded-lg px-4 py-2" />
        </div>
        <div>
          <label class="block text-gray-700 font-medium mb-1">Due Date</label>
          <input type="date" v-model="form.due_date" class="w-full border border-gray-300 rounded-lg px-4 py-2" />
        </div>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Status</label>
        <select v-model="form.status" class="w-full border border-gray-300 rounded-lg px-4 py-2">
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">
        Update Task
      </button>
    </form>
  </div>
</div>
</template>