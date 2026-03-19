<script setup>
    import { ref} from 'vue'
    const currentPath = ref(window.location.hash)
    let serviceId =  currentPath.value.split("/")[2]
    const service = {
            "id": 1,
            "name": "Comptabilité"
        }
    const name = ref(service.name)
    function send() {
        service.name = name.value
        console.log(service)
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