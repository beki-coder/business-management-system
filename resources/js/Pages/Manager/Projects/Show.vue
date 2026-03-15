<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  project: Object
})
</script>

<template>
<div class="container">
  <div class="card">
    <h1>Project Details</h1>

    <div class="details">
      <div class="row">
        <span class="label">Name:</span>
        <span>{{ project.name }}</span>
      </div>

      <div class="row">
        <span class="label">Description:</span>
        <span>{{ project.description || 'N/A' }}</span>
      </div>

      <div class="row">
        <span class="label">Start Date:</span>
        <span>{{ project.start_date || 'N/A' }}</span>
      </div>

      <div class="row">
        <span class="label">End Date:</span>
        <span>{{ project.end_date || 'N/A' }}</span>
      </div>
    </div>

    <div class="mt-4 flex justify-center gap-4">
      <Link href="/manager/projects" class="btn-blue">Back to Projects</Link>
      <Link :href="`/manager/projects/${project.id}/edit`" class="btn-yellow">Edit Project</Link>
    </div>
  </div>
</div>
</template>

<style scoped>
.container { max-width:600px; margin:auto; padding:20px; font-family:Arial; }
.card { background:#fff; padding:25px; border-radius:8px; border:1px solid #ddd; }
.details { margin-top:10px; }
.row { display:flex; justify-content:space-between; padding:8px; background:#f9f9f9; border-radius:4px; margin-bottom:8px; }
.label { font-weight:600; }
.btn-blue { background:#2563eb; color:white; padding:8px 16px; border-radius:4px; text-decoration:none; }
.btn-blue:hover { background:#1e40af; }
.btn-yellow { background:#f59e0b; color:white; padding:8px 16px; border-radius:4px; text-decoration:none; }
.btn-yellow:hover { background:#b45309; }
</style>