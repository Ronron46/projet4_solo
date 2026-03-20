<script setup>
import { ref } from 'vue'
import { createSite, editSite, getSite, deleteSite } from '../repository/SiteRepository'
const currentPath = ref(window.location.hash)
let siteId =  currentPath.value.split("/")[2]
let site
if (siteId != 'create') {
    site = await getSite(siteId)
} else {
    site = {
        "name":""
    }
}
const name = ref(site.name)
const status = ref(site.status)
function send(){
    site.name = name.value
    if (siteId != 'create') {
        editSite(site)
    } else {
        createSite(site)
    }
    setTimeout(() => {
    window.location.replace('#/siteList')}, "300")
}

function deleteSiteConfirm(id) {
    if(confirm("voulez vous vraiment supprimer ce site?")) {
        deleteSite(id)
        setTimeout(() => {
        window.location.replace('#/siteList')}, "300")
    }
}
</script>

<template>
    <a href="#/siteList">Retour</a>
    <h1 v-if="siteId != 'create'">Modifier le site</h1>
    <h1 v-else> Creer un nouveau site</h1>
    <form @submit.prevent="submit">
        <label>
            Nom
            <input v-model="name">
        </label>
        <br>
        <button @click="send()"> Valider</button>
    </form>
    <button v-if="siteId!='create'" style="width: 25%; margin-inline: auto; background-color: red; border-radius: 0.2rem; padding: 0.2rem; margin-top: 2rem;" v-on:click="deleteSiteConfirm(site.id)">supprimer</button>
</template>