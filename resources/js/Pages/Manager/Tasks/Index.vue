<template>
<div>
<h1>Tasks</h1>

<Link href="/manager/tasks/create">Create Task</Link>

<table border="1">
<tr>
<th>Name</th>
<th>Project</th>
<th>Status</th>
<th>Actions</th>
</tr>

<tr v-for="task in tasks" :key="task.id">
<td>{{ task.name }}</td>
<td>{{ task.project.name }}</td>
<td>{{ task.status }}</td>
<td>
<Link :href="`/manager/tasks/${task.id}`">View</Link>
<Link :href="`/manager/tasks/${task.id}/edit`">Edit</Link>
</td>
</tr>
</table>

</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
tasks: Array
})
</script>