<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
    clients: Array
})

function deleteClient(id){
    if(confirm('Are you sure you want to delete this client?')){
        router.delete(`/admin/clients/${id}`)
    }
}
</script>

<template>
<div class="container">

    <div class="header">
        <h1>Clients</h1>
        <Link href="/admin/clients/create" class="create-btn">
            Add Client
        </Link>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="client in clients" :key="client.id">
                    <td>{{ client.name }}</td>
                    <td>{{ client.email }}</td>
                    <td>{{ client.phone }}</td>
                    <td>{{ client.company }}</td>
                    <td>{{ client.address }}</td>
                    <td class="actions">
                        <Link :href="`/admin/clients/${client.id}/edit`" class="edit">Edit</Link>
                        <button @click="deleteClient(client.id)" class="delete">Delete</button>
                    </td>
                </tr>
                <tr v-if="clients.length === 0">
                    <td colspan="6" class="empty">No Clients Found</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</template>

<style scoped>
.container { max-width:1000px; margin:auto; padding:20px; font-family:Arial; }
.header { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.create-btn { background:#2563eb; color:white; padding:8px 16px; border-radius:4px; text-decoration:none; }
.card { background:#f9f9f9; padding:20px; border-radius:8px; border:1px solid #ddd; }
table { width:100%; border-collapse:collapse; }
th, td { padding:10px; border-bottom:1px solid #ddd; text-align:left; }
th { background:#f1f1f1; }
.actions { display:flex; gap:8px; }
.edit { color:#2563eb; text-decoration:none; }
.delete { background:#dc2626; border:none; color:white; padding:5px 10px; border-radius:4px; cursor:pointer; }
.empty { text-align:center; padding:20px; }
</style>