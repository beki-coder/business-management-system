<script setup>
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Admin Dashboard" />

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

        <div class="grid grid-cols-3 gap-4">

            <Link href="/admin/employees" class="p-4 bg-blue-500 text-white rounded">
                Manage Employees
            </Link>

            <Link href="/admin/clients" class="p-4 bg-green-500 text-white rounded">
                Manage Clients
            </Link>

            <Link href="/reports" class="p-4 bg-purple-500 text-white rounded">
                View Reports
            </Link>

        </div>
    </div>
</template>