<template>
  <div>
    <h1>Create Employee</h1>

    <form @submit.prevent="submit">

      <div>
        <label>Name</label>
        <input v-model="form.name" type="text" />
      </div>

      <div>
        <label>Email</label>
        <input v-model="form.email" type="email" />
      </div>

      <div>
        <label>Password</label>
        <input v-model="form.password" type="password" />
      </div>

      <button type="submit">Save</button>

    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  name: '',
  email: '',
  password: ''
})

function submit() {
  router.post('/admin/employees', form)
}
</script>