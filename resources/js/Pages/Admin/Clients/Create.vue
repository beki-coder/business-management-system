<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    phone: '',
    company: '',
    address: ''
})

function submit(){
    form.post('/admin/clients')
}
</script>

<template>
<div class="container">

    <div class="header">
        <h1>Create Client</h1>
        <Link href="/admin/clients" class="back-btn">Back</Link>
    </div>

    <div class="card">
        <form @submit.prevent="submit">

            <div class="form-group">
                <label>Client Name</label>
                <input v-model="form.name" type="text" placeholder="Enter client name" />
                <div v-if="form.errors.name" class="error">{{ form.errors.name }}</div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input v-model="form.email" type="email" placeholder="Enter client email" />
                <div v-if="form.errors.email" class="error">{{ form.errors.email }}</div>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input v-model="form.phone" type="text" placeholder="Enter phone number" />
                <div v-if="form.errors.phone" class="error">{{ form.errors.phone }}</div>
            </div>

            <div class="form-group">
                <label>Company</label>
                <input v-model="form.company" type="text" placeholder="Enter company name" />
                <div v-if="form.errors.company" class="error">{{ form.errors.company }}</div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea v-model="form.address" placeholder="Enter address"></textarea>
                <div v-if="form.errors.address" class="error">{{ form.errors.address }}</div>
            </div>

            <div class="actions">
                <button type="submit" :disabled="form.processing">Save Client</button>
                <Link href="/admin/clients" class="cancel">Cancel</Link>
            </div>

        </form>
    </div>

</div>
</template>

<style scoped>
.container { max-width:700px; margin:auto; padding:20px; font-family:Arial; }
.header { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
.back-btn { text-decoration:none; color:#2563eb; }
.card { background:#f9f9f9; padding:25px; border-radius:8px; border:1px solid #ddd; }
.form-group { display:flex; flex-direction:column; margin-bottom:16px; }
label { font-weight:600; margin-bottom:5px; }
input, textarea { padding:9px; border:1px solid #ccc; border-radius:4px; }
textarea { min-height:90px; }
.actions { display:flex; gap:10px; margin-top:20px; }
button { background:#2563eb; color:white; border:none; padding:9px 18px; border-radius:4px; cursor:pointer; }
button:hover { background:#1e40af; }
.cancel { background:#ccc; padding:9px 18px; border-radius:4px; text-decoration:none; color:black; }
.error { color:red; font-size:13px; margin-top:4px; }
</style>