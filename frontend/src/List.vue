<script setup>
//import tasks from "@/test.json";
import api from "./services/api";
import { ref, onMounted } from "vue";
import Header from "./Header.vue";
const tasks = ref([]);
const fetchTasks = async () => {
  try {
    const response = await api.get("/api/tasks/");
    console.log(response.data);
    tasks.value = response.data;
    return response.data;
  } catch (error) {
    if (error.response) {
      console.error("Error response:", error.response);
      throw new Error(
        `Error: ${error.response.status} ${error.response.statusText}`,
      );
    } else if (error.request) {
      console.error("Error request:", error.request);
      throw new Error("Error: No response received from server");
    } else {
      console.error("Error message:", error.message);
      throw new Error("Error: An unexpected error occurred");
    }
  }
};

onMounted(fetchTasks);
</script>
<template>
  <Header/>
  <div id="list">
    <div class="task-header">
      <div></div>
      <div>Task</div>
      <div>Notes</div>
      <div>Done</div>
    </div>
    <div v-for="(task, index) in tasks" :key="task.id" class="task-row">
      <div>{{ index + 1 }}</div>
      <div>{{ task.task }}</div>
      <div>{{ task.notes }}</div>
      <div>
        <input
          type="checkbox"
          v-model="task.done"
          :true-value="1"
          :false-value="0"
        />
      </div>
    </div>
  </div>
</template>
<style scoped>
#list {
  border: 2px black;
  display: flex;
  flex-direction: column;
}
.task-header {
}
.task-row {
}
.task-header,
.task-row {
  display: grid;
  grid-template-columns: 0.5fr 2fr 1fr 1fr;
}
</style>
