<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  employee: Object
})
</script>

<template>
<div class="container">
  <div class="card">
    <h1>Employee Details</h1>
    <div class="details">
      <div class="row">
        <span class="label">Name:</span>
        <span>{{ employee.name }}</span>
      </div>
      <div class="row">
        <span class="label">Email:</span>
        <span>{{ employee.email }}</span>
      </div>
    </div>
    <div class="mt-4">
      <Link href="/admin/employees" class="back-btn">Back to Employees</Link>
    </div>
  </div>
</div>
</template>

<style scoped>
.container { max-width:500px; margin:auto; padding:20px; font-family:Arial; }
.card { background:#fff; padding:25px; border-radius:8px; border:1px solid #ddd; }
.details { margin-top:10px; }
.row { display:flex; justify-content:space-between; padding:8px; background:#f9f9f9; border-radius:4px; margin-bottom:8px; }
.label { font-weight:600; }
.back-btn { color:#2563eb; text-decoration:none; }
</style>