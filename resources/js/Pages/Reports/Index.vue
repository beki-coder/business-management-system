<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-8">
    <div class="max-w-7xl mx-auto">

      <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-10">
        📊 Project Reports Dashboard
      </h1>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white p-6 rounded-2xl shadow">
          <p class="text-gray-500 text-sm">Total Projects</p>
          <h2 class="text-3xl font-bold text-blue-600">{{ projects.length }}</h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
          <p class="text-gray-500 text-sm">Total Tasks</p>
          <h2 class="text-3xl font-bold text-purple-600">{{ totalTasks }}</h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
          <p class="text-gray-500 text-sm">Completed Tasks</p>
          <h2 class="text-3xl font-bold text-green-600">{{ completedTasks }}</h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
          <p class="text-gray-500 text-sm">Pending Tasks</p>
          <h2 class="text-3xl font-bold text-orange-600">{{ pendingTasks }}</h2>
        </div>

      </div>

      <div v-if="projects.length === 0" class="text-center py-20">
        <p class="text-xl text-gray-500">No projects found</p>
      </div>

      <div v-else class="grid gap-6">

        <div
          v-for="project in projects"
          :key="project.id"
          class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition p-8"
        >

          <div class="flex justify-between items-center mb-6">

            <div>
              <h2 class="text-2xl font-bold text-gray-800">
                {{ project.name }}
              </h2>

              <p class="text-gray-500">
                {{ project.description || 'No description' }}
              </p>
            </div>

            <span
              :class="statusBadge(projectStatus(project.tasks))"
              class="px-4 py-2 rounded-full text-sm font-semibold"
            >
              {{ projectStatus(project.tasks) }}
            </span>

          </div>

          <div class="mb-6">
            <div class="w-full bg-gray-200 rounded-full h-3">
              <div
                class="bg-blue-600 h-3 rounded-full"
                :style="{ width: projectProgress(project.tasks) + '%' }"
              ></div>
            </div>
            <p class="text-sm text-gray-500 mt-2">
              {{ projectProgress(project.tasks) }}% Completed
            </p>
          </div>

          <div>

            <h3 class="font-semibold text-gray-700 mb-4">
              Tasks
            </h3>

            <div v-if="!project.tasks || project.tasks.length === 0"
                 class="text-gray-400">
              No tasks
            </div>

            <div v-else class="space-y-3">

              <div
                v-for="task in project.tasks"
                :key="task.id"
                class="flex items-center justify-between bg-gray-50 p-3 rounded-xl"
              >

                <div class="flex items-center gap-3">

                  <span
                    class="w-3 h-3 rounded-full"
                    :class="taskStatusColor(task.status)"
                  ></span>

                  <span class="text-gray-800 font-medium">
                    {{ task.title || task.name }}
                  </span>

                </div>

                <span class="text-sm text-gray-500 capitalize">
                  {{ task.status }}
                </span>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
</template>

<script setup>
import { computed } from "vue"

const props = defineProps({
  projects: {
    type: Array,
    default: () => []
  }
})


const totalTasks = computed(() =>
  props.projects.reduce((sum, p) => sum + (p.tasks?.length || 0), 0)
)

const completedTasks = computed(() =>
  props.projects.reduce((sum, p) => {
    return sum + (p.tasks?.filter(t => t.status === "completed").length || 0)
  }, 0)
)

const pendingTasks = computed(() =>
  totalTasks.value - completedTasks.value
)


function projectStatus(tasks = []) {
  if (!tasks.length) return "No tasks"

  const allCompleted = tasks.every(t => t.status === "completed")
  const inProgress = tasks.some(t => t.status === "in_progress")

  if (allCompleted) return "Completed"
  if (inProgress) return "In Progress"

  return "Pending"
}


function projectProgress(tasks = []) {

  if (!tasks.length) return 0

  const completed = tasks.filter(t => t.status === "completed").length

  return Math.round((completed / tasks.length) * 100)
}


function statusBadge(status) {

  const map = {
    Completed: "bg-green-100 text-green-700",
    "In Progress": "bg-yellow-100 text-yellow-700",
    Pending: "bg-orange-100 text-orange-700",
    "No tasks": "bg-gray-100 text-gray-600"
  }

  return map[status] || "bg-gray-100"
}

function taskStatusColor(status) {

  const map = {
    completed: "bg-green-500",
    in_progress: "bg-yellow-500",
    pending: "bg-gray-400"
  }

  return map[status] || "bg-gray-400"
}
</script>

<style scoped>

::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-thumb {
  background: #cbd5f5;
  border-radius: 10px;
}

</style>