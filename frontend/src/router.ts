import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import ApiTest from './views/ApiTest.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/api-test',
    name: 'ApiTest',
    component: ApiTest
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router