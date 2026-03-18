<script setup>
import { ref, computed } from 'vue'
const currentPath = ref(window.location.hash)
let employeeId =  currentPath.value.split("/")[2]
const name = ref('')
const firstName = ref('')
const phone = ref('')
const email = ref('')
const service = ref('')
const site = ref('')
</script>
<template>
    <form>
        <label>
            Nom
            <input v-model="name">
        </label>
        <label>
            Prénom
            <input v-model="firstName">
        </label>
        <label>
            Téléphone
            <input v-model="phone">
        </label>
        <label>
            Email
            <input v-model="email">
        </label>
        <label>
            Service
            <input v-model="service">
        </label>
        <label>
            Site
            <input v-model="site">
        </label>
    </form>
</template>