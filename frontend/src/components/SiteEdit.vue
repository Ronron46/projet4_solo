<script setup>
import { ref } from 'vue'
import { editSite, getSite } from '../repository/SiteRepository'
const currentPath = ref(window.location.hash)
let siteId =  currentPath.value.split("/")[2]
    let site = await getSite(siteId)
    const name = ref(site.name)
    const status = ref(site.status)
    function send(){
        site.name = name.value
        console.log(site)
        editSite(site)
        window.location.replace('#/siteList')
    }
</script>

<template>
    <a href="#/siteList">Retour</a>
    <h1>Modifier le site</h1>
    <form @submit.prevent="submit">
        <label>
            Nom
            <input v-model="name">
        </label>
        <br>
        <button @click="send()"> Valider</button>
    </form>
</template>