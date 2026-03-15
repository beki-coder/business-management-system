<template>
  <div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-6">Add User</h1>

    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label class="block font-medium mb-1">Name</label>
        <input v-model="form.name" type="text" class="w-full border rounded px-3 py-2" />
        <p v-if="errors.name" class="text-red-500 text-sm mt-1">{{ errors.name }}</p>
      </div>

      <div>
        <label class="block font-medium mb-1">Email</label>
        <input v-model="form.email" type="email" class="w-full border rounded px-3 py-2" />
        <p v-if="errors.email" class="text-red-500 text-sm mt-1">{{ errors.email }}</p>
      </div>

      <div>
        <label class="block font-medium mb-1">Password</label>
        <input v-model="form.password" type="password" class="w-full border rounded px-3 py-2" />
        <p v-if="errors.password" class="text-red-500 text-sm mt-1">{{ errors.password }}</p>
      </div>

      <div>
        <label class="block font-medium mb-1">Confirm Password</label>
        <input v-model="form.password_confirmation" type="password" class="w-full border rounded px-3 py-2" />
      </div>

      <div>
        <label class="block font-medium mb-1">Department</label>
        <select v-model="form.department_id" class="w-full border rounded px-3 py-2">
          <option value="">Select Department</option>
          <option v-for="d in departments" :key="d.id" :value="d.id">{{ d.name }}</option>
        </select>
      </div>

      <div>
        <label class="block font-medium mb-1">Position</label>
        <select v-model="form.position_id" class="w-full border rounded px-3 py-2">
          <option value="">Select Position</option>
          <option v-for="p in positions" :key="p.id" :value="p.id">{{ p.title }}</option>
        </select>
      </div>

      <div>
        <label class="block font-medium mb-1">Role</label>
        <select v-model="form.role" class="w-full border rounded px-3 py-2">
          <option value="">Select Role</option>
          <option v-for="r in roles" :key="r.id" :value="r.name">{{ r.name }}</option>
        </select>
        <p v-if="errors.role" class="text-red-500 text-sm mt-1">{{ errors.role }}</p>
      </div>

      <div class="flex space-x-2">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          Save
        </button>
        <inertia-link :href="route('users.index')" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
          Cancel
        </inertia-link>
      </div>
    </form>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const roles = props.roles;
const departments = props.departments;
const positions = props.positions;

const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  department_id: '',
  position_id: '',
  role: '',
});

const errors = props.errors || {};

function submit() {
  Inertia.post(route('users.store'), form);
}
</script>