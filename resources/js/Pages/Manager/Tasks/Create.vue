<template>
  <div>
    <h1>Create Task</h1>

    <form @submit.prevent="submit">

      <div>
        <label>Task Name</label>
        <input type="text" v-model="form.name" />
      </div>

      <div>
        <label>Project</label>
        <select v-model="form.project_id">
          <option value="" disabled>Select Project</option>
          <option v-for="project in projects" :key="project.id" :value="project.id">
            {{ project.name }}
          </option>
        </select>
      </div>

      <div>
        <label>Description</label>
        <textarea v-model="form.description"></textarea>
      </div>

      <div>
        <label>Start Date</label>
        <input type="date" v-model="form.start_date" />
      </div>

      <div>
        <label>Due Date</label>
        <input type="date" v-model="form.due_date" />
      </div>

      <div>
        <label>Status</label>
        <select v-model="form.status">
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <button type="submit">Create Task</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  projects: Array
})

const form = useForm({
  name: '',
  project_id: '',
  description: '',
  start_date: '',
  due_date: '',
  status: 'pending'
})

function submit() {
  form.post('/manager/tasks')
}
</script>