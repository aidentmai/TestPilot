<template>
  <div class="api-test">
    <h1>API Test</h1>
    <p>Test the connection between Vue.js frontend and Laravel backend</p>

    <div class="test-section">
      <h2>Test API Endpoints</h2>

      <div class="test-buttons">
        <button @click="testHello" :disabled="loading" class="btn btn-primary">
          {{ loading ? "Loading..." : "Test Hello Endpoint" }}
        </button>

        <button
          @click="testStatus"
          :disabled="loading"
          class="btn btn-secondary"
        >
          {{ loading ? "Loading..." : "Test Status Endpoint" }}
        </button>

        <button @click="testItems" :disabled="loading" class="btn btn-tertiary">
          {{ loading ? "Loading..." : "Test Items Endpoint" }}
        </button>
      </div>

      <div v-if="error" class="error-message">
        <h3>❌ Error</h3>
        <pre>{{ error }}</pre>
      </div>

      <div v-if="response" class="success-message">
        <h3>✅ Success</h3>
        <pre>{{ formattedResponse }}</pre>
      </div>
    </div>

    <div class="info-section">
      <h2>Connection Info</h2>
      <div class="info-card">
        <p><strong>Frontend URL:</strong> http://localhost:3000</p>
        <p><strong>Backend URL:</strong> http://localhost:8000</p>
        <p><strong>API Proxy:</strong> /api/* → http://localhost:8000/api/*</p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from "vue";
import { apiService } from "../services/api";

const loading = ref(false);
const response = ref<any>(null);
const error = ref<string | null>(null);

const formattedResponse = computed(() => {
  return JSON.stringify(response.value, null, 2);
});

const testHello = async () => {
  loading.value = true;
  error.value = null;
  response.value = null;

  try {
    const res = await apiService.getHello();
    response.value = res.data;
  } catch (err: any) {
    error.value = err.message || "An error occurred";
  } finally {
    loading.value = false;
  }
};

const testStatus = async () => {
  loading.value = true;
  error.value = null;
  response.value = null;

  try {
    const res = await apiService.getStatus();
    response.value = res.data;
  } catch (err: any) {
    error.value = err.message || "An error occurred";
  } finally {
    loading.value = false;
  }
};

const testItems = async () => {
  loading.value = true;
  error.value = null;
  response.value = null;

  try {
    const res = await apiService.getItems();
    response.value = res.data;
  } catch (err: any) {
    error.value = err.message || "An error occurred";
  } finally {
    loading.value = false;
  }
};
</script>

<style scoped>
.api-test {
  max-width: 800px;
  margin: 0 auto;
}

.test-section,
.info-section {
  margin: 2rem 0;
  padding: 1.5rem;
  background: #f8f9fa;
  border-radius: 8px;
}

.test-buttons {
  display: flex;
  gap: 1rem;
  margin: 1rem 0;
  flex-wrap: wrap;
}

.btn {
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 4px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

.btn-primary {
  background-color: #42b883;
  color: white;
}

.btn-primary:hover:not(:disabled) {
  background-color: #369870;
}

.btn-secondary {
  background-color: #6c757d;
  color: white;
}

.btn-secondary:hover:not(:disabled) {
  background-color: #5a6268;
}

.btn-tertiary {
  background-color: #17a2b8;
  color: white;
}

.btn-tertiary:hover:not(:disabled) {
  background-color: #138496;
}

.error-message {
  background-color: #f8d7da;
  border: 1px solid #f5c6cb;
  color: #721c24;
  padding: 1rem;
  border-radius: 4px;
  margin-top: 1rem;
}

.success-message {
  background-color: #d4edda;
  border: 1px solid #c3e6cb;
  color: #155724;
  padding: 1rem;
  border-radius: 4px;
  margin-top: 1rem;
}

.error-message h3,
.success-message h3 {
  margin-top: 0;
}

pre {
  background-color: rgba(0, 0, 0, 0.05);
  padding: 0.5rem;
  border-radius: 4px;
  overflow-x: auto;
  margin: 0;
}

.info-card {
  background: white;
  padding: 1rem;
  border-radius: 4px;
  border: 1px solid #dee2e6;
}

.info-card p {
  margin: 0.5rem 0;
}
</style>
