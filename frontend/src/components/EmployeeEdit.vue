<script setup>
import { ref} from 'vue'
import { editEmployee, getEmployee } from '../repository/EmployeeRepository'
import { getServices } from '../repository/ServiceRepository'
import { getSites } from '../repository/SiteRepository'
const currentPath = ref(window.location.hash)
let employeeId =  currentPath.value.split("/")[2]

let employee = await getEmployee(employeeId)

let services = await getServices()

let sites = await getSites()

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
    editEmployee(employee)
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
            <select v-model="site">
                <option v-for="si in sites" :value="si.id">{{ si.name }}</option>
            </select>
        </label>
        <br>
        <button @click="send()"> Valider</button>
    </form>
</template>