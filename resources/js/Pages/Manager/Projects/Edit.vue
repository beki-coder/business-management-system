<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  project: Object
})

const form = useForm({
  name: props.project.name,
  description: props.project.description,
  start_date: props.project.start_date,
  end_date: props.project.end_date
})

function submit() {
  form.put(`/manager/projects/${props.project.id}`)
}
</script>

<template>
<div class="container">
  <div class="card">
    <h1>Edit Project</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label>Name</label>
        <input v-model="form.name" type="text"/>
      </div>

      <div>
        <label>Description</label>
        <textarea v-model="form.description" rows="4"></textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label>Start Date</label>
          <input type="date" v-model="form.start_date"/>
        </div>
        <div>
          <label>End Date</label>
          <input type="date" v-model="form.end_date"/>
        </div>
      </div>

      <button type="submit">Update Project</button>
    </form>

    <div class="mt-4">
      <Link href="/manager/projects" class="back-btn">Back to Projects</Link>
    </div>
  </div>
</div>
</template>

<style scoped>
.container { max-width:600px; margin:auto; padding:20px; font-family:Arial; }
.card { background:#fff; padding:25px; border-radius:8px; border:1px solid #ddd; }
label { display:block; margin-bottom:5px; font-weight:600; }
input, textarea { width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; margin-bottom:12px; }
button { background:#2563eb; color:white; padding:10px 20px; border:none; border-radius:4px; cursor:pointer; }
button:hover { background:#1e40af; }
.back-btn { color:#2563eb; text-decoration:none; }
</style>