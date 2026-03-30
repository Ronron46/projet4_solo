<script setup>
import { getCurrentInstance, inject, ref} from 'vue'
import { findEmployee, getEmployees } from '../repository/EmployeeRepository'
import { getServices } from '../repository/ServiceRepository'
import { getSites } from '../repository/SiteRepository'

let login = inject('login')
let service = ref('')
let services = await getServices()
let site = ref('')
let sites = await getSites()
const name = ref('')

let employees = ref(await getEmployees());

async function search() {
    //Object.assign(employees, await FindEmployee(name.value))
    employees.value = await findEmployee(name.value, service.value, site.value)

    //employees = await FindEmployee(name.value)
}
</script>

<template>
    <a href="#/login">login</a>
    <h1 class="test">Liste des employées</h1>
    <a v-if="login != null" href="#/employeeEdit/create">Créer un employé</a>
    <div style="display: flex; flex-direction: row; justify-content: center;">
        <a href="#/siteList"> Liste des sites</a><pre>    </pre><a href="#/serviceList">Liste des services</a>
    </div>
    <div>
        <form v-on:submit.prevent="search()">
            <label>
                rechercher par nom
                <input v-model="name">
            </label>
            <label>
                Service
                <select v-model="service" >
                    <option value=""></option>
                    <option v-for="s in services" :value="s.id">{{ s.name }}</option>
                </select>
            </label>
            <label>
                Site
                <select v-model="site">
                    <option value=""></option>
                <option v-for="si in sites" :value="si.id">{{ si.name }}</option>
            </select>
            </label>
            <button type="submit"> chercher </button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th v-if="login != null"></th><th>Nom</th><th>Prénom</th><th>Téléphone</th><th>Email</th><th>Service</th><th>Site</th>

            </tr>
        </thead>
            <tbody v-for="(employee) in employees">
                    <tr>
                        <td v-if="login != null"><a :href="'#/employeeEdit/' + employee.id" >Modifier</a></td>
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.firstName }}</td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.service.name }}</td>
                        <td>{{ employee.site.name }}</td>
                    </tr>
            </tbody>
    </table>    
</template>