<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
          <h1 class="text-2xl font-bold text-gray-900">Enterprise Management</h1>
          <nav class="space-x-6">
            <Link href="/" class="text-gray-700 hover:text-gray-900 font-medium">Dashboard</Link>
            <Link href="/projects" class="text-gray-700 hover:text-gray-900 font-medium">Projects</Link>
          </nav>
        </div>
      </div>
    </header>

    <!-- Flash Messages -->
    <div v-if="$page.props.flash.success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mx-4 mt-4 rounded">
      {{ $page.props.flash.success }}
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
