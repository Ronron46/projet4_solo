<script setup>
import { inject } from 'vue';
import { getSites } from '../repository/SiteRepository';

let login = inject('login')
let sites = await getSites()

</script>

<template>
    <a href="#/">Retour</a>
    <h1>Liste des sites</h1>
    <a v-if="login != null" href="#/siteEdit/create">Creer un nouveau site</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th><th>status</th><th v-if="login != null"></th>
            </tr>
        </thead>
        <tbody v-for="site in sites">
            <tr>
                <td>{{ site.name }}</td>
                <td>{{ site.status }}</td>
                <td v-if="login != null">
                    <a :href="'#/siteEdit/' + site.id">Modifier</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>