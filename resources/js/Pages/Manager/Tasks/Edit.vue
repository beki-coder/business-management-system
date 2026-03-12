<template>
  <div>
    <h1>Edit Task</h1>

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

      <button type="submit">Update Task</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  task: Object,
  projects: Array
})

const form = useForm({
  name: props.task.name,
  project_id: props.task.project_id,
  description: props.task.description,
  start_date: props.task.start_date,
  due_date: props.task.due_date,
  status: props.task.status
})

function submit() {
  form.put(`/manager/tasks/${props.task.id}`)
}
</script>