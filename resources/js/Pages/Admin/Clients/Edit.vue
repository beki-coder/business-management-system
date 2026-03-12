<template>
  <div>
    <h1>Edit Client</h1>
    <form @submit.prevent="submit">
      <input v-model="form.name" placeholder="Name" />
      <input v-model="form.email" placeholder="Email" />
      <input v-model="form.company" placeholder="Company" />
      <input v-model="form.phone" placeholder="Phone" />
      <textarea v-model="form.address" placeholder="Address"></textarea>
      <button type="submit">Update</button>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/vue3'

const { props } = usePage()
const client = props.value.client

const form = reactive({
  name: client.name,
  email: client.email,
  company: client.company,
  phone: client.phone,
  address: client.address
})

const submit = () => {
  Inertia.put(`/admin/clients/${client.id}`, form)
}
</script>