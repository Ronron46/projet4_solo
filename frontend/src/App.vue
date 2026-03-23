<script setup>
import HelloWorld from './components/HelloWorld.vue'
import EmployeeList from './components/EmployeeList.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';
import SiteList from './components/SiteList.vue';
import SiteEdit from './components/SiteEdit.vue';
import ServiceList from './components/ServiceList.vue';
import ServiceEdit from './components/ServiceEdit.vue';
import { ref, computed, provide } from 'vue';
import Login from './components/Login.vue';
import { AuthService } from './services/AuthService';

const routes = {
  '/': EmployeeList,
  '/employeeEdit': EmployeeEdit,
  '/siteList': SiteList,
  '/siteEdit': SiteEdit,
  '/serviceList': ServiceList,
  '/serviceEdit': ServiceEdit,
  '/login': Login
}

const currentPath = ref(window.location.hash)

window.addEventListener('hashchange', () => {
  currentPath.value = window.location.hash
})

const currentView = computed(() => {
  let uri = currentPath.value.split("/");
  if (uri.length == 1){
    return routes["/"]
  }
  else {
    return routes["/" + uri[1]]
  }
  
})

let login = ref('')
function loginCheck() {
  if (localStorage.getItem('user') != null) {
  login.value = localStorage.getItem('user')
  } else {
    login.value = null
  }
console.log(localStorage.getItem('user'))
}

function deconnect() {
  AuthService.logout()
  login.value = null
}

provide('login', login)
</script>

<template>
  {{ loginCheck() }}
      <div v-if="login != null">
      hello there
      <button @click="deconnect()"> se déconnecter</button>
    </div>
  <suspense>
  <component :is="currentView" />
  </suspense>
</template>
