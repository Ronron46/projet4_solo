<script setup>
import { inject, ref} from 'vue'
import { createService, deleteService, editService, getService } from '../repository/ServiceRepository'

let login = inject('login')
    const currentPath = ref(window.location.hash)
    let serviceId =  currentPath.value.split("/")[2]
    let service
    if (serviceId != "create") {
        service = await getService(serviceId, login)
    } else {
        service = {
            "name":""
        }
    }
    const name = ref(service.name)
    function send() {
        service.name = name.value
        if (serviceId != "create") {
            editService(service, login)
        } else {
            createService(service, login)
        }
        setTimeout(() => {
        window.location.replace('#/serviceList')}, "300")
    }

    function deleteServiceConfirm(id) {
        if(confirm("voulez vous vraiment supprimer ce Service?")) {
            deleteService(id, login)
            setTimeout(() => {
            window.location.replace('#/serviceList')}, "300")
        }
    }
</script>

<template>
    <a href="#/serviceList">Retour</a>
    <h1 v-if="serviceId!= 'create'">Modifier le Service</h1>
    <h1 v-else> Creer un nouveau service</h1>
    <form v-on:submit.prevent="send()">
        <label>
            Nom
            <input required v-model="name">
        </label>
        <br>
        <button type="submit">Valider</button>
    </form>
    <button v-if="serviceId!='create'" style="width: 25%; margin-inline: auto; background-color: red; border-radius: 0.2rem; padding: 0.2rem; margin-top: 2rem;" v-on:click="deleteServiceConfirm(service.id)">supprimer</button>
</template>