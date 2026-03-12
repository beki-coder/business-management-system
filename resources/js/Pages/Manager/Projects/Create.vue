<template>
  <div>
    <h1>Create Project</h1>
    <form @submit.prevent="submit">
      <div>
        <label>Name</label>
        <input type="text" v-model="form.name" />
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
        <label>End Date</label>
        <input type="date" v-model="form.end_date" />
      </div>

      <button type="submit">Create Project</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

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