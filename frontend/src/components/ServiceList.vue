<script setup>
import { inject } from 'vue';
import { getServices } from '../repository/ServiceRepository';
let login = inject('login')
let services = await getServices()
</script>

<template>
    <a href="#/">Retour</a>
    <h1>Liste des Services</h1>
    <a v-if="login != null" href="#/serviceEdit/create">Creer un nouveau service</a>
    <table style="width: 50%; margin-inline: auto;">
        <thead>
            <tr>
                <th>Nom</th><th v-if="login != null"></th>
            </tr>
        </thead>
        <tbody v-for="service in services">
            <tr>
                <td>{{ service.name }}</td>
                <td v-if="login != null"><a :href="'#/serviceEdit/' + service.id">Modifier</a></td>
            </tr>
        </tbody>
    </table>
</template>