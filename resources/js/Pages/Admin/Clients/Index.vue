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
<div class="clients-container">
    <div class="clients-header">
        <div class="header-content">
            <div class="header-left">
                <div class="header-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="page-title">Clients</h1>
                    <p class="subtitle">{{ clients.length }} total clients</p>
                </div>
            </div>
        </div>
        <Link href="/admin/clients/create" class="create-button">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="btn-icon">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add New Client
        </Link>
    </div>

    <div class="clients-card">
        <div class="table-container">
            <div class="table-wrapper">
                <table class="clients-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">
                                    <span>Name</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <span>Email</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <span>Phone</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <span>Company</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <span>Address</span>
                                </div>
                            </th>
                            <th class="actions-header">
                                <div class="th-content">
                                    <span>Actions</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="client in clients" :key="client.id" class="client-row">
                            <td>
                                <div class="cell-content">
                                    <div class="avatar-placeholder">CN</div>
                                    <div class="client-info">
                                        <div class="client-name">{{ client.name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cell-content">
                                    <span class="email">{{ client.email }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="cell-content">
                                    <span class="phone">{{ client.phone }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="cell-content">
                                    <span class="company">{{ client.company }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="cell-content">
                                    <span class="address truncate">{{ client.address }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <Link :href="`/admin/clients/${client.id}/edit`" class="action-btn edit-btn" title="Edit Client">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </Link>
                                    <button @click="deleteClient(client.id)" class="action-btn delete-btn" title="Delete Client">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="clients.length === 0">
                            <td colspan="6" class="empty-state">
                                <div class="empty-content">
                                    <div class="empty-icon">
                                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <h3>No Clients Found</h3>
                                    <p>Get started by creating your first client.</p>
                                    <Link href="/admin/clients/create" class="empty-cta">Create First Client</Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>
.clients-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
}

.clients-header {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0,0, 0.1), 0 2px 4px -1px rgba(0, 0,0, 0.06);
    margin-bottom: 2rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
    line-height: 1.2;
}

.subtitle {
    color: #6b7280;
    margin: 0;
    font-size: 1rem;
}

.create-button {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    box-shadow: 0 4px 14px 0 rgba(102, 126, 234, 0.39);
    transition: all 0.2s ease;
    border: none;
}

.create-button:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 25px 0 rgba(102, 126, 234, 0.5);
}

.btn-icon {
    stroke: white;
}

.clients-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 25px -3px rgba(0, 0,0, 0.1), 0 4px 6px -2px rgba(0, 0,0, 0.05);
}

.table-container {
    overflow-x: auto;
}

.table-wrapper {
    min-width: 800px;
}

.clients-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.clients-table th {
    background: #f8fafc;
    position: sticky;
    top: 0;
    z-index: 10;
}

.th-content {
    padding: 1.25rem 1rem;
    text-align: left;
    font-weight: 600;
    color: #374151;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.client-row {
    transition: all 0.2s ease;
    border-bottom: 1px solid #f1f5f9;
}

.client-row:hover {
    background: #f8fafc;
    transform: scale(1.01);
}

.cell-content {
    padding: 1.25rem 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.avatar-placeholder {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.875rem;
    flex-shrink: 0;
}

.client-info .client-name {
    font-weight: 600;
    color: #1f2937;
    font-size: 0.95rem;
}

.email, .phone, .company, .address {
    color: #4b5563;
    font-size: 0.9rem;
}

.truncate {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.actions-header {
    text-align: right !important;
}

.actions-cell {
    padding: 1.25rem 1rem !important;
    display: flex;
    gap: 0.5rem;
    justify-content: flex-end;
}

.action-btn {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    cursor: pointer;
    flex-shrink: 0;
}

.edit-btn {
    background: #dbeafe;
    color: #2563eb;
}

.edit-btn:hover {
    background: #bfdbfe;
    transform: translateY(-1px);
}

.delete-btn {
    background: #fee2e2;
    color: #dc2626;
}

.delete-btn:hover {
    background: #fecaca;
    transform: translateY(-1px);
}

.action-btn svg {
    stroke: currentColor;
}

.empty-state {
    height: 300px;
}

.empty-content {
    text-align: center;
    padding: 2rem;
}

.empty-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 1rem;
    color: #d1d5db;
}

.empty-content h3 {
    color: #374151;
    margin: 0 0 0.5rem;
    font-size: 1.125rem;
    font-weight: 600;
}

.empty-content p {
    color: #6b7280;
    margin: 0 0 1.5rem;
}

.empty-cta {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 0.75rem 2rem;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    box-shadow: 0 4px 14px 0 rgba(102, 126, 234, 0.39);
}


@media (max-width: 768px) {
    .clients-container {
        padding: 1rem;
    }
    
    .clients-header {
        padding: 1.5rem;
        flex-direction: column;
        gap: 1.5rem;
        text-align: center;
    }
    
    .header-left {
        justify-content: center;
    }
    
    .table-wrapper {
        min-width: 100%;
    }
}
</style>
