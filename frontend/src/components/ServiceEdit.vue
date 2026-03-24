<script setup>
    import { ref} from 'vue'
import { createService, deleteService, editService, getService } from '../repository/ServiceRepository'
    const currentPath = ref(window.location.hash)
    let serviceId =  currentPath.value.split("/")[2]
    let service
    if (serviceId != "create") {
        service = await getService(serviceId)
    } else {
        service = {
            "name":""
        }
    }
    const name = ref(service.name)
    function send() {
        service.name = name.value
        if (serviceId != "create") {
            editService(service)
        } else {
            createService(service)
        }
        setTimeout(() => {
        window.location.replace('#/serviceList')}, "300")
    }

    function deleteServiceConfirm(id) {
        if(confirm("voulez vous vraiment supprimer ce Service?")) {
            deleteService(id)
            setTimeout(() => {
            window.location.replace('#/serviceList')}, "300")
        }
    }
</script>

<template>
    <a href="#/serviceList">Retour</a>
    <h1 v-if="serviceId!= 'create'">Modifier le Service</h1>
    <h1 v-else> Creer un nouveau service</h1>
    <form @submit.prevent="submit">
        <label>
            Nom
            <input v-model="name">
        </label>
        <br>
        <button @click="send()">Valider</button>
    </form>
    <button v-if="serviceId!='create'" style="width: 25%; margin-inline: auto; background-color: red; border-radius: 0.2rem; padding: 0.2rem; margin-top: 2rem;" v-on:click="deleteServiceConfirm(service.id)">supprimer</button>
</template>