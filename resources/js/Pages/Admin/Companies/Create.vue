<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-indigo-100 p-8">
    <div class="max-w-3xl mx-auto">

      <div class="flex justify-between items-center mb-8">
        <div>
          <h1 class="text-3xl font-bold text-gray-800">Create Company</h1>
          <p class="text-gray-500">Add a new company to the system</p>
        </div>

        <Link
          href="/admin/companies"
          class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600"
        >
          Back
        </Link>
      </div>

      <div class="bg-white shadow-xl rounded-2xl p-8">
        <form @submit.prevent="submit" class="space-y-6">

          <div>
            <label class="block font-semibold mb-2">Company Name</label>

            <input
              v-model="form.name"
              type="text"
              placeholder="Company name"
              class="w-full border rounded-lg px-4 py-2"
            />

            <p v-if="errors.name" class="text-red-500 text-sm mt-1">
              {{ errors.name[0] }}
            </p>
          </div>

          <div>
            <label class="block font-semibold mb-2">Description</label>

            <textarea
              v-model="form.description"
              rows="4"
              placeholder="Company description"
              class="w-full border rounded-lg px-4 py-2"
            ></textarea>

            <p v-if="errors.description" class="text-red-500 text-sm mt-1">
              {{ errors.description[0] }}
            </p>
          </div>

          <div class="flex gap-4">

            <button
              type="submit"
              class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700"
            >
              Create Company
            </button>

            <Link
              href="/admin/companies"
              class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500"
            >
              Cancel
            </Link>

          </div>

        </form>
      </div>

    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue"
import { router, Link, usePage } from "@inertiajs/vue3"

const { props } = usePage()

const errors = props.errors ?? {}

const form = reactive({
  name: "",
  description: ""
})

function submit() {
  router.post("/admin/companies", form)
}
</script>