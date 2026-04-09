<template>
  <div class="home">
    <h1>TestPilot</h1>
    <p class="tagline">
      Run and monitor browser tests directly from your web interface.
    </p>

    <PestTestRunner />

    <div class="about">
      <h2>What this does</h2>
      <p>
        TestPilot connects a Vue frontend with a Laravel backend to execute
        automated browser tests using Laravel Dusk. It provides real-time
        feedback, structured results, and a clean UI for debugging failures.
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import PestTestRunner from "../components/PestTestRunner.vue";
</script>

<style scoped>
.home {
  max-width: 800px;
  margin: 0 auto;
  text-align: center;
}

h1 {
  font-size: 2.5rem;
  color: #42b883;
  margin-bottom: 0.5rem;
}

.tagline {
  color: #666;
  margin-bottom: 2rem;
}

.about {
  margin-top: 3rem;
  text-align: left;
  background: #f8f9fa;
  padding: 1.5rem;
  border-radius: 8px;
}

.about h2 {
  margin-top: 0;
  color: #42b883;
}
</style>