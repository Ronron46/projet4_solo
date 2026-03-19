<script setup>
import HelloWorld from './components/HelloWorld.vue'
import EmployeeList from './components/EmployeeList.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';
import SiteList from './components/SiteList.vue';
import SiteEdit from './components/SiteEdit.vue';
import ServiceList from './components/ServiceList.vue';
import { ref, computed } from 'vue';

const routes = {
  '/': EmployeeList,
  '/detail': EmployeeEdit,
  '/siteList': SiteList,
  '/siteEdit': SiteEdit,
  '/serviceList': ServiceList
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
</script>

<template>
  <component :is="currentView" />
</template>
