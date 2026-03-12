<template>
  <div>

    <h1>Clients</h1>

    <table border="1">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Company</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="client in clients" :key="client.id">
          <td>{{ client.name }}</td>
          <td>{{ client.email }}</td>
          <td>{{ client.company }}</td>
        </tr>

        <tr v-if="clients.length === 0">
          <td colspan="3">No Clients Found</td>
        </tr>
      </tbody>

    </table>

  </div>
</template>

<script setup>

defineProps({
  clients: Array
})

</script>