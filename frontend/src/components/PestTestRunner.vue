<template>
  <div class="pest-test-runner">
    <h2>Pest Test Runner</h2>

    <button @click="runTest" :disabled="loading" class="btn btn-primary">
      {{ loading ? "Running Test..." : "Run Moodle Homepage Test" }}
    </button>

    <!-- SUMMARY -->
    <div v-if="summary" class="summary" :class="summary.failed ? 'fail' : 'pass'">
      <h3>
        {{ summary.failed ? "❌ Tests Failed" : "✅ Tests Passed" }}
      </h3>
      <p>
        {{ summary.total }} test • {{ summary.duration }}s
      </p>
    </div>

    
    <!-- RAW OUTPUT -->
    <div v-if="rawOutput" class="raw">
      <button @click="showRaw = !showRaw" class="btn btn-secondary">
        {{ showRaw ? "Hide Raw Output" : "Show Raw Output" }}
      </button>
      <pre v-if="showRaw">{{ rawOutput }}</pre>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import axios from "axios";

const loading = ref(false);
const rawOutput = ref("");
const showRaw = ref(false);

const summary = ref<any>(null);
const tests = ref<any[]>([]);

const runTest = async () => {
  loading.value = true;
  rawOutput.value = "";
  summary.value = null;
  tests.value = [];

  try {
    const response = await axios.post("/api/run-pest-test");

    const data = response.data;
    rawOutput.value = data.stdout;

    parseOutput(data.stdout);
  } catch (error) {
    console.error("Error running test:", error);
    rawOutput.value = "Error running test.";
  } finally {
    loading.value = false;
  }
};

const parseOutput = (output: string) => {
  // SUMMARY
  const failed = output.includes("FAIL");
  const durationMatch = output.match(/Duration:\s+([\d.]+)s/);

  summary.value = {
    failed,
    total: 1,
    duration: durationMatch ? durationMatch[1] : "0",
  };

  // TEST NAME
  const nameMatch = output.match(/⨯ (.+)/);
  const fileMatch = output.match(/at (.+):(\d+)/);

  // EXPECTED / ACTUAL
  const expectedMatch = output.match(/-\s*'(.+)'/);
  const actualMatch = output.match(/\+\s*'(.+)'/);

  tests.value = [
    {
      name: nameMatch ? nameMatch[1] : "Unknown Test",
      status: failed ? "failed" : "passed",
      file: fileMatch ? fileMatch[1] : "",
      line: fileMatch ? fileMatch[2] : "",
      message: "Assertion failed",
      expected: expectedMatch ? expectedMatch[1] : "",
      actual: actualMatch ? actualMatch[1] : "",
    },
  ];
};
</script>

<style scoped>
.pest-test-runner {
  background: #f8f9fa;
  padding: 1.5rem;
  border-radius: 8px;
}

.btn {
  padding: 0.6rem 1.2rem;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}

.btn-primary {
  background: #42b883;
  color: white;
}

.btn-secondary {
  margin-top: 1rem;
  background: #6c757d;
  color: white;
}

.summary {
  margin-top: 1rem;
  padding: 1rem;
  border-radius: 6px;
}

.summary.pass {
  background: #d4edda;
}

.summary.fail {
  background: #f8d7da;
}

.results {
  margin-top: 1rem;
}

.test-card {
  padding: 1rem;
  border-radius: 6px;
  margin-bottom: 1rem;
}

.test-card.failed {
  background: #fff3f3;
  border-left: 5px solid red;
}

.test-card.passed {
  background: #f0fff4;
  border-left: 5px solid green;
}

.test-header {
  display: flex;
  justify-content: space-between;
  font-weight: bold;
}

.file {
  font-size: 0.9rem;
  color: #666;
}

.error {
  margin-top: 0.5rem;
}

.raw pre {
  margin-top: 1rem;
  background: #222;
  color: #0f0;
  padding: 1rem;
  border-radius: 6px;
}
</style>