<script setup>
import { inject, ref} from 'vue'
import { createEmployee, editEmployee, getEmployee, deleteEmployee } from '../repository/EmployeeRepository'
import { getServices } from '../repository/ServiceRepository'
import { getSites } from '../repository/SiteRepository'

let login = inject('login')
const currentPath = ref(window.location.hash)
let employeeId =  currentPath.value.split("/")[2]
let employee = ""
if (employeeId != "create") {
    employee = await getEmployee(employeeId, login)
} else {
    employee = {
        "name":"",
        "firstName":"",
        "phone":"",
        "email":"",
        "service":"",
        "site":""
    }
}

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
    if (employeeId != "create"){
        editEmployee(employee, login)
    }else {
        createEmployee(employee, login)
    }
    setTimeout(() => {
        window.location.replace('#/')}, "300")
}

function deleteEmployeeConfirm(id) {
    if(confirm("voulez vous vraiment supprimer ce Service?")) {
        deleteEmployee(id, login)
        setTimeout(() => {
        window.location.replace('#/')}, "300")
    }
}
</script>

<template>
    <a href="#/">retour</a>
    <h1 v-if="employeeId != 'create'">Modifier l'employé</h1>
    <h1 v-else>Creer un nouvel employé</h1>
    <form @v-on:submit.prevent="send()">
        <label>
            Nom
            <input required v-model="name">
        </label>
        <br>
        <label>
            Prénom
            <input required v-model="firstName">
        </label>
        <br>
        <label>
            Téléphone
            <input required v-model="phone">
        </label>
        <br>
        <label>
            Email
            <input required type="email" v-model="email">
        </label>
        <br>
        <label>
            Service
            <select required v-model="service" >
                <option v-for="s in services" :value="s.id">{{ s.name }}</option>
            </select>
        </label>
        <br>
        <label>
            Site
            <select required v-model="site">
                <option v-for="si in sites" :value="si.id">{{ si.name }}</option>
            </select>
        </label>
        <br>
        <button type="submit"> Valider</button>
    </form>
        <button v-if="employeeId!='create'" style="width: 25%; margin-inline: auto; background-color: red; border-radius: 0.2rem; padding: 0.2rem; margin-top: 2rem;" v-on:click="deleteEmployeeConfirm(employee.id)">supprimer</button>
</template>