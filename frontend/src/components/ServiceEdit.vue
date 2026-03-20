<script setup>
    import { ref} from 'vue'
import { editService, getService } from '../repository/ServiceRepository'
    const currentPath = ref(window.location.hash)
    let serviceId =  currentPath.value.split("/")[2]
    let service = await getService(serviceId)
    const name = ref(service.name)
    function send() {
        service.name = name.value
        console.log(service)
        editService(service)
        window.location.replace("#/serviceList")
    }
</script>

<template>
    <a href="#/serviceList">Retour</a>
    <h1>Modifier le Service</h1>
    <form @submit.prevent="submit">
        <label>
            Nom
            <input v-model="name">
        </label>
        <br>
        <button @click="send()">Valider</button>
    </form>
</template>