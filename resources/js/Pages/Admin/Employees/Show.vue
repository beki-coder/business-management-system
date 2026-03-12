<template>
  <div>
    <h1>Employee Details</h1>

    <p><strong>Name:</strong> {{ employee.name }}</p>
    <p><strong>Email:</strong> {{ employee.email }}</p>

    <Link href="/admin/employees">Back</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  employee: Object
})
</script>