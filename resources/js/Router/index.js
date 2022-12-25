import { createWebHistory,createRouter } from "vue-router";
//Auth Component
import Login from "../components/pages/Login.vue";
import Registration from "../components/pages/Registration.vue";
//Auth Component
import Home from "../components/pages/Home.vue";
const routes = [
      {
        path:"/",
        name:'Home',
        component:Home
      },
      {
        path:"/login",
        name:'Login',
        component:Login
      },
      {
        path:"/registration",
        name:'Registration',
        component:Registration
      }
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router;
