<template>
  <div>
    <h1>Edit Employee</h1>

    <form @submit.prevent="submit">

      <div>
        <label>Name</label>
        <input v-model="form.name" type="text" />
      </div>

      <div>
        <label>Email</label>
        <input v-model="form.email" type="email" />
      </div>

      <button type="submit">Update</button>

    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  employee: Object
})

const form = reactive({
  name: props.employee.name,
  email: props.employee.email
})

function submit() {
  router.put(`/admin/employees/${props.employee.id}`, form)
}
</script>