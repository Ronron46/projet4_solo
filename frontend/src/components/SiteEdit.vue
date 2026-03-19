<script setup>
import { ref } from 'vue'
const currentPath = ref(window.location.hash)
let siteId =  currentPath.value.split("/")[2]
    let site = {
        "id": 1,
        "name": "Paris",
        "status": "Siege Administratif"
    };
    const name = ref(site.name)
    const status = ref(site.status)
    function send(){
        site.name = name.value
        console.log(site)
        window.location.replace('#/siteList')
    }
</script>

<template>
    <a href="#/siteList">Retour</a>
    <h1>Modifier le site</h1>
    <form @submit.prevent="submit">
        <label>
            nom
            <input v-model="name">
        </label>
        <br>
        <button @click="send()"> Valider</button>
    </form>
</template>