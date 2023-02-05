import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import UserIndex from '../views/users/UserIndex.vue';
import RoleIndex from '../views/roles/RoleIndex.vue';



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/users',
      name: 'UserIndex',
      component: UserIndex
    },
    {
      path: '/roles',
      name: 'RoleIndex',
      component: RoleIndex
    },
  ]
})

export default router
