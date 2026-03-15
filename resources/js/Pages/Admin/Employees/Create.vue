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

<template>
<div class="container">
  <div class="card">
    <h1>Create Employee</h1>
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label>Name</label>
        <input v-model="form.name" type="text" placeholder="Enter full name"/>
      </div>
      <div>
        <label>Email</label>
        <input v-model="form.email" type="email" placeholder="Enter email"/>
      </div>
      <div>
        <label>Password</label>
        <input v-model="form.password" type="password" placeholder="Enter password"/>
      </div>
      <button type="submit">Save Employee</button>
    </form>
    <div class="mt-4">
      <router-link href="/admin/employees" class="back-btn">Back to Employees</router-link>
    </div>
  </div>
</div>
</template>

<style scoped>
.container { max-width:500px; margin:auto; padding:20px; font-family:Arial; }
.card { background:#fff; padding:25px; border-radius:8px; border:1px solid #ddd; }
label { display:block; margin-bottom:5px; font-weight:600; }
input { width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; margin-bottom:12px; }
button { background:#2563eb; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; }
button:hover { background:#1e40af; }
.back-btn { color:#2563eb; text-decoration:none; }
</style>