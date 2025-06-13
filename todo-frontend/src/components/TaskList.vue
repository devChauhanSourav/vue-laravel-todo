<template>
  <div>
 
     <h2>Add Task</h2>
    <form @submit.prevent="addTask">
      <input v-model="newTask" placeholder="Enter task title" />
      <button type="submit">➕ Add</button>
    </form>

    <hr />
    
    
    <h2>Tasks</h2>
    <ul v-if="tasks.length">
      <li v-for="task in tasks" :key="task.id">
        <input
          type="checkbox"
          :checked="task.completed"
          @change="toggleComplete(task)"
        />
        <span :style="{ textDecoration: task.completed ? 'line-through' : 'none' }">
          {{ task.title }}
        </span>
        <button @click="deleteTask(task.id)" style="margin-left: 10px">🗑️ Delete</button>
      </li>
    </ul>
    <p v-else>No tasks found.</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import api from '../api'

const tasks = ref([])
const newTask = ref('')

// ✅ Fetch all tasks
const fetchTasks = async () => {
  try {
    const response = await api.get('/tasks')
    tasks.value = response.data.map(task => ({ ...task, editing: false }))
  } catch (error) {
    alert('Failed to load tasks')
  }
}

// ✅ Add task
const addTask = async () => {
  if (!newTask.value.trim()) return

  try {
    const response = await api.post('/tasks', {
      title: newTask.value,
      completed: false
    })
    tasks.value.push({ ...response.data, editing: false })
    newTask.value = ''
  } catch (error) {
    alert('Failed to add task')
  }
}

const deleteTask = async (id) => {
  const confirmDelete = confirm('Are you sure you want to delete this task?')
  if (!confirmDelete) return

  try {
    await api.delete(`/tasks/${id}`)
    tasks.value = tasks.value.filter(task => task.id !== id)
  } catch (error) {
    alert(`Failed to delete task: ${error.response?.data?.message || error.message}`)
  }
}



const toggleComplete = async (task) => {
  const confirmToggle = confirm(
    task.completed
      ? 'Mark this task as incomplete?'
      : 'Mark this task as completed?'
  )
  if (!confirmToggle) return

  try {
    const response = await api.put(`/tasks/${task.id}`, {
      title: task.title,
      completed: !task.completed,
    })
    task.completed = response.data.completed
  } catch (error) {
    alert(`Failed to update task: ${error.response?.data?.message || error.message}`)
  }
}


// ✅ Start editing
const startEditing = (task) => {
  task.editing = true
}

// ✅ Cancel editing
const cancelEditing = (task) => {
  task.editing = false
  fetchTasks() // revert to saved title
}

// ✅ Update title
const updateTaskTitle = async (task) => {
  try {
    const response = await api.put(`/tasks/${task.id}`, {
      title: task.title,
      completed: task.completed,
    })
    task.title = response.data.title
    task.editing = false
  } catch (error) {
    alert('Failed to update title')
  }
}



onMounted(fetchTasks)
</script>
