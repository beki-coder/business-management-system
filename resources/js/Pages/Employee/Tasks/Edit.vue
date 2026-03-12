<template>
  <div>
    <h1>Edit Task</h1>

    <form @submit.prevent="submit">
      <div>
        <label>Status</label>
        <select v-model="form.status">
          <option value="pending">Pending</option>
          <option value="in_progress">In Progress</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <div>
        <label>Description</label>
        <textarea v-model="form.description"></textarea>
      </div>

      <button type="submit">Update Task</button>
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