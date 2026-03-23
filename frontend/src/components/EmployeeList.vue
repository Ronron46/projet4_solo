<script setup>
import { inject, ref} from 'vue'
import { getEmployees } from '../repository/EmployeeRepository'

let login = inject('login')

let employees = ref(await getEmployees());


</script>

<template>
    <a href="#/login">Login</a>
    <h1 class="test">Liste des employées</h1>
    <a v-if="login != null" href="#/employeeEdit/create">Créer un employé</a>
    <div style="display: flex; flex-direction: row; justify-content: center;">
        <a href="#/siteList"> Liste des sites</a><pre>    </pre><a href="#/serviceList">Liste des services</a>
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