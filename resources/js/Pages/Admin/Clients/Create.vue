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
.container {
    max-width: 700px;
    margin: 0 auto;
    padding: 2rem;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="300" cy="300" r="200" fill="url(%23a)"><animate attributeName="r" values="200;250;200" dur="8s" repeatCount="indefinite"/></circle><circle cx="700" cy="700" r="150" fill="url(%23a)"><animate attributeName="r" values="150;200;150" dur="10s" repeatCount="indefinite"/></circle></svg>');
    pointer-events: none;
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
    position: relative;
    z-index: 2;
}

.header h1 {
    font-size: 2.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #ffffff 0%, #f0f4ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
    text-shadow: 0 4px 20px rgba(255,255,255,0.3);
}

.back-btn {
    text-decoration: none;
    color: rgba(255,255,255,0.9);
    font-weight: 600;
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 50px;
    backdrop-filter: blur(10px);
    background: rgba(255,255,255,0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 32px rgba(0,0,0,0.1);
}

.back-btn:hover {
    color: #ffffff;
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0,0,0,0.2);
}

.card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    padding: 3rem;
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 25px 45px rgba(0,0,0,0.1),
        inset 0 1px 0 rgba(255,255,255,0.5);
    position: relative;
    z-index: 2;
    animation: slideUp 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 2rem;
    position: relative;
}

label {
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: #ffffff;
    font-size: 1rem;
    letter-spacing: 0.025em;
    text-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

input, textarea {
    padding: 1rem 1.25rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    color: #ffffff;
    font-size: 1rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
        inset 0 2px 4px rgba(0,0,0,0.05),
        0 4px 20px rgba(0,0,0,0.05);
}

input::placeholder,
textarea::placeholder {
    color: rgba(255,255,255,0.6);
}

input:focus,
textarea:focus {
    outline: none;
    border-color: rgba(255,255,255,0.4);
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-2px);
    box-shadow: 
        0 12px 40px rgba(0,0,0,0.15),
        inset 0 2px 4px rgba(0,0,0,0.05),
        0 0 0 4px rgba(255,255,255,0.1);
}

textarea {
    min-height: 120px;
    resize: vertical;
    font-family: inherit;
}

.error {
    color: #f87171;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    font-weight: 500;
    background: rgba(248, 113, 113, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    border-left: 4px solid #f87171;
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-4px); }
    75% { transform: translateX(4px); }
}

.actions {
    display: flex;
    gap: 1rem;
    margin-top: 2.5rem;
}

button {
    flex: 1;
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    color: white;
    border: none;
    padding: 1.25rem 2rem;
    border-radius: 16px;
    cursor: pointer;
    font-weight: 700;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
        0 10px 30px rgba(79, 70, 229, 0.4),
        inset 0 1px 0 rgba(255,255,255,0.3);
    position: relative;
    overflow: hidden;
}

button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s;
}

button:hover::before {
    left: 100%;
}

button:hover:not(:disabled) {
    transform: translateY(-3px);
    box-shadow: 
        0 20px 50px rgba(79, 70, 229, 0.5),
        inset 0 1px 0 rgba(255,255,255,0.4);
}

button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.cancel {
    background: rgba(255,255,255,0.15);
    color: #ffffff;
    text-decoration: none;
    padding: 1.25rem 2rem;
    border-radius: 16px;
    font-weight: 700;
    font-size: 1.1rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border: 1px solid rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cancel:hover {
    background: rgba(255,255,255,0.25);
    transform: translateY(-2px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding: 1rem;
    }
    
    .card {
        padding: 2rem 1.5rem;
    }
    
    .header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .header h1 {
        font-size: 2rem;
    }
    
    .actions {
        flex-direction: column;
    }
}
</style>
