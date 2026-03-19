<script setup>
import HelloWorld from './components/HelloWorld.vue'
import EmployeeList from './components/EmployeeList.vue';
import EmployeeEdit from './components/EmployeeEdit.vue';
import { ref, computed } from 'vue'

const routes = {
  '/': EmployeeList,
  '/detail': EmployeeEdit
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
