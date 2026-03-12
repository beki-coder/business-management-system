<template>
  <div>
    <h1>Project Details</h1>
    <p><strong>Name:</strong> {{ project.name }}</p>
    <p><strong>Description:</strong> {{ project.description || 'N/A' }}</p>
    <p><strong>Start Date:</strong> {{ project.start_date || 'N/A' }}</p>
    <p><strong>End Date:</strong> {{ project.end_date || 'N/A' }}</p>

    <div style="margin-top:20px;">
      <Link href="/manager/projects">Back to Projects</Link>
      |
      <Link :href="`/manager/projects/${project.id}/edit`">Edit Project</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  project: Object
})
</script>