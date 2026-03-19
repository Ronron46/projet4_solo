<script setup>
import { ref} from 'vue'
const currentPath = ref(window.location.hash)
let employeeId =  currentPath.value.split("/")[2]
const employee = {
        "id": 1,
        "name": "Jean",
        "firstName": "Jean",
        "phone": "0555555559",
        "email": "jean.jean@boite.fr",
        "service": {
            "id": 2,
            "name": "Production"
        },
        "site": {
            "id": 2,
            "name": "Nantes"
        }
    }

const services = [
    {
        "id": 1,
        "name": "Comptabilité"
    },
    {
        "id": 2,
        "name": "Production"
    },
    {
        "id": 3,
        "name": "Accueil"
    }
]
const name = ref(employee.name)
const firstName = ref(employee.firstName)
const phone = ref(employee.phone)
const email = ref(employee.email)
const service = ref(employee.service.id)
const site = ref(employee.site.id)

function send() {
    employee.name = name.value
    employee.firstName = firstName.value
    employee.phone = phone.value
    employee.email = email.value
    employee.service = service.value
    employee.site = site.value
    console.log(employee)
    window.location.replace('#/')
}
</script>

<template>
    <a href="#/">retour</a>
    <h1>Modifier l'employé</h1>
    <form @submit.prevent="submit">
        <label>
            Nom
            <input v-model="name">
        </label>
        <br>
        <label>
            Prénom
            <input v-model="firstName">
        </label>
        <br>
        <label>
            Téléphone
            <input v-model="phone">
        </label>
        <br>
        <label>
            Email
            <input v-model="email">
        </label>
        <br>
        <label>
            Service
            <select v-model="service" >
                <option v-for="s in services" :value="s.id">{{ s.name }}</option>
            </select>
        </label>
        <br>
        <label>
            Site
            <input v-model="site">
        </label>
        <br>
        <button @click="send()"> Valider</button>
    </form>
</template>