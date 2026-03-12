<template>
  <div>
    <h1>Add Client</h1>
    <form @submit.prevent="submit">
      <input v-model="form.name" placeholder="Name" />
      <input v-model="form.email" placeholder="Email" />
      <input v-model="form.company" placeholder="Company" />
      <input v-model="form.phone" placeholder="Phone" />
      <textarea v-model="form.address" placeholder="Address"></textarea>
      <button type="submit">Save</button>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const form = reactive({
  name: '',
  email: '',
  phone: '',
  company: '',
  address: ''
})

const submit = () => {
  Inertia.post('/admin/clients', form)
}
</script>