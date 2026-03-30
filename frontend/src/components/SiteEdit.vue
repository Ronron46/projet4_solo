<script setup>
import { inject, ref } from 'vue'
import { createSite, editSite, getSite, deleteSite } from '../repository/SiteRepository'
let login = inject('login')
let error = ref('')
const currentPath = ref(window.location.hash)
let siteId =  currentPath.value.split("/")[2]
let site
if (siteId != 'create') {
    site = await getSite(siteId, login)
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
        editSite(site, login)
    } else {
        createSite(site, login)
    }
    setTimeout(() => {
    window.location.replace('#/siteList')}, "300")
}

async function deleteSiteConfirm(id) {
    if(confirm("voulez vous vraiment supprimer ce site?")) {
        let response = await deleteSite(id, login)
        if (response != "error"){
            setTimeout(() => {
            window.location.replace('#/siteList')}, "300")
        } else {
            error.value = 'delete-error'
        }
    }
}
</script>

<template>
    <a href="#/siteList">Retour</a>
    <h1 v-if="siteId != 'create'">Modifier le site</h1>
    <h1 v-else> Creer un nouveau site</h1>
    <form v-on:submit.prevent="send()">
        <label>
            Nom
            <input required v-model="name">
        </label>
        <br>
        <button type="submit"> Valider</button>
    </form>
    <button v-if="siteId!='create'" style="width: 25%; margin-inline: auto; background-color: red; border-radius: 0.2rem; padding: 0.2rem; margin-top: 2rem;" v-on:click="deleteSiteConfirm(site.id)">supprimer</button>
    <div v-if="error == 'delete-error'" style="color: red;">
        Vous ne pouvez pas supprimer ce site, des employés y sont assignés
    </div>
</template>