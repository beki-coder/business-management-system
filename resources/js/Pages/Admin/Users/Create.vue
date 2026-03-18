<template>
  <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-lg mx-auto">
      <div class="text-center mb-10">
        <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl">
          <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
        </div>
        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-2">
          Add New User
        </h1>
        <p class="text-gray-600 max-w-md mx-auto">Fill in the details to create a new team member</p>
      </div>

      <div class="bg-white/80 backdrop-blur-xl shadow-2xl border border-white/50 rounded-3xl p-8 space-y-6">
        <form @submit.prevent="submit" class="space-y-6">
          <div class="space-y-2">
            <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Full Name</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
              </div>
              <input 
                v-model="form.name" 
                type="text" 
                class="w-full pl-12 pr-4 py-4 bg-white/50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 placeholder-gray-400 text-lg"
                placeholder="Enter full name"
              />
            </div>
            <p v-if="errors.name" class="text-red-500 text-sm font-medium animate-pulse">{{ errors.name }}</p>
          </div>

          <div class="space-y-2">
            <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Email Address</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
              </div>
              <input 
                v-model="form.email" 
                type="email" 
                class="w-full pl-12 pr-4 py-4 bg-white/50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 placeholder-gray-400 text-lg"
                placeholder="user@company.com"
              />
            </div>
            <p v-if="errors.email" class="text-red-500 text-sm font-medium animate-pulse">{{ errors.email }}</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Password</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                  </svg>
                </div>
                <input 
                  v-model="form.password" 
                  type="password" 
                  class="w-full pl-12 pr-4 py-4 bg-white/50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 placeholder-gray-400 text-lg"
                  placeholder="••••••••"
                />
              </div>
              <p v-if="errors.password" class="text-red-500 text-sm font-medium animate-pulse">{{ errors.password }}</p>
            </div>

            <div class="space-y-2">
              <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Confirm Password</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                  </svg>
                </div>
                <input 
                  v-model="form.password_confirmation" 
                  type="password" 
                  class="w-full pl-12 pr-4 py-4 bg-white/50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 placeholder-gray-400 text-lg"
                  placeholder="••••••••"
                />
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Department</label>
              <select 
                v-model="form.department_id" 
                class="w-full px-4 py-4 bg-white/50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 text-lg appearance-none bg-no-repeat bg-right"
              >
                <option value="">Select Department</option>
                <option v-for="d in departments" :key="d.id" :value="d.id">{{ d.name }}</option>
              </select>
            </div>

            <div class="space-y-2">
              <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Position</label>
              <select 
                v-model="form.position_id" 
                class="w-full px-4 py-4 bg-white/50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all duration-300 text-lg appearance-none bg-no-repeat bg-right"
              >
                <option value="">Select Position</option>
                <option v-for="p in positions" :key="p.id" :value="p.id">{{ p.title }}</option>
              </select>
            </div>
          </div>

          <div class="space-y-2">
            <label class="block font-semibold text-gray-800 text-sm uppercase tracking-wide">Role</label>
            <select 
              v-model="form.role" 
              class="w-full px-4 py-4 bg-gradient-to-r from-indigo-50 to-purple-50 border border-gray-200 rounded-2xl shadow-sm focus:ring-4 focus:ring-indigo-500/30 focus:border-indigo-500 transition-all duration-300 text-lg appearance-none bg-no-repeat bg-right"
            >
              <option value="">Select Role</option>
              <option v-for="r in roles" :key="r.id" :value="r.name">{{ r.name }}</option>
            </select>
            <p v-if="errors.role" class="text-red-500 text-sm font-medium animate-pulse">{{ errors.role }}</p>
          </div>

          <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-4">
            <button 
              type="submit" 
              class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold py-4 px-8 rounded-2xl shadow-xl hover:from-indigo-700 hover:to-purple-700 focus:ring-4 focus:ring-indigo-500/50 transform hover:-translate-y-1 transition-all duration-300 text-lg flex items-center justify-center gap-2"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              Create User
            </button>
            <inertia-link 
              :href="route('users.index')" 
              class="flex-1 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-semibold py-4 px-8 rounded-2xl shadow-xl hover:from-gray-600 hover:to-gray-700 focus:ring-4 focus:ring-gray-500/50 transform hover:-translate-y-1 transition-all duration-300 text-lg text-center"
            >
              Cancel
            </inertia-link>
          </div>
        </form>
      </div>
    </div>
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
