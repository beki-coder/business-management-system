<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-8">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-10 gap-6">
        <div>
          <h1 class="text-4xl md:text-5xl font-black bg-gradient-to-r from-gray-900 to-slate-700 bg-clip-text text-transparent mb-2">
            User Management
          </h1>
          <p class="text-xl text-slate-600 font-medium">Manage your team members efficiently</p>
        </div>
        
        <Link
          :href="route('users.create')"
          class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold text-lg rounded-2xl shadow-2xl hover:shadow-3xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-1 transition-all duration-300 border-2 border-transparent hover:border-blue-400"
        >
          <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Add New User
        </Link>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-slate-600 uppercase tracking-wider">Total Users</p>
              <p class="text-3xl font-black text-slate-900 mt-1">{{ usersList.length }}</p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
              </svg>
            </div>
          </div>
        </div>
        
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-slate-600 uppercase tracking-wider">Departments</p>
              <p class="text-3xl font-black text-slate-900 mt-1">{{ new Set(usersList.map(u => u.department?.name)).size }}</p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
              </svg>
            </div>
          </div>
        </div>
        
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-slate-600 uppercase tracking-wider">Active Roles</p>
              <p class="text-3xl font-black text-slate-900 mt-1">{{ new Set(usersList.map(u => u.roles[0]?.name)).size }}</p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
          </div>
        </div>
      </div>

      <div v-if="usersList.length" class="bg-white/70 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/60 overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-slate-100">
          <h2 class="text-2xl font-bold text-slate-800">All Team Members</h2>
        </div>
        
        <div class="overflow-x-auto">
          <table class="w-full">
            <thead>
              <tr class="bg-gradient-to-r from-slate-50 to-slate-100 border-b-2 border-slate-200">
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">ID</th>
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Name</th>
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Email</th>
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Department</th>
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Position</th>
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Role</th>
                <th class="px-8 py-6 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
              <tr 
                v-for="user in usersList" 
                :key="user.id" 
                class="hover:bg-slate-50/50 transition-all duration-200 group"
              >
                <td class="px-8 py-6 whitespace-nowrap">
                  <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-sm shadow-lg">
                    {{ user.id }}
                  </div>
                </td>
                <td class="px-8 py-6">
                  <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                      <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                      </svg>
                    </div>
                    <div>
                      <div class="font-semibold text-slate-900 text-lg">{{ user.name }}</div>
                      <div class="text-sm text-slate-500">{{ user.email }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-8 py-6 text-sm text-slate-600 font-medium">{{ user.email }}</td>
                <td class="px-8 py-6">
                  <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                    {{ user.department?.name || 'N/A' }}
                  </span>
                </td>
                <td class="px-8 py-6">
                  <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                    {{ user.position?.title || 'N/A' }}
                  </span>
                </td>
                <td class="px-8 py-6">
                  <span 
                    :class="{
                      'bg-purple-100 text-purple-800 border-purple-200': true,
                      'bg-gradient-to-r from-orange-400 to-orange-500 text-white border-orange-400': user.roles[0]?.name === 'Admin'
                    }"
                    class="inline-flex px-3 py-1 rounded-full text-xs font-semibold border"
                  >
                    {{ user.roles[0]?.name || 'N/A' }}
                  </span>
                </td>
                <td class="px-8 py-6">
                  <div class="flex space-x-3">
                    <Link
                      :href="route('users.edit', user.id)"
                      class="group relative p-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:from-yellow-500 hover:to-yellow-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center hover:scale-105"
                      title="Edit User"
                    >
                      <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.5h3m1.5-3l-3-3m0 0l-3 3m3-3v12"></path>
                      </svg>
                    </Link>
                    <button
                      @click="destroy(user.id)"
                      class="group relative p-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center hover:scale-105"
                      title="Delete User"
                    >
                      <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div v-else class="text-center py-24 px-8">
        <div class="max-w-md mx-auto">
          <div class="w-32 h-32 bg-gradient-to-br from-slate-200 to-slate-300 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-2xl">
            <svg class="w-20 h-20 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <h3 class="text-3xl font-bold text-slate-900 mb-4">No users yet</h3>
          <p class="text-xl text-slate-600 mb-8 max-w-md mx-auto">Your team is ready to grow. Add your first user to get started.</p>
          <Link
            :href="route('users.create')"
            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold text-lg rounded-2xl shadow-2xl hover:shadow-3xl hover:from-blue-700 hover:to-blue-800 transform hover:-translate-y-1 transition-all duration-300"
          >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Create First User
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const { props } = usePage();
const usersList = ref(props.users || []);

function destroy(id) {
  if (confirm('Are you sure you want to delete this user?')) {
    Inertia.delete(route('users.destroy', id), {
      onSuccess: () => {
        usersList.value = usersList.value.filter(u => u.id !== id);
      }
    });
  }
}
</script>
