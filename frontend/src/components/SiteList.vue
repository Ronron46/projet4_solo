<script setup>
import { getSites } from '../repository/SiteRepository';

    let sites = await getSites()

</script>

<template>
    <a href="#/">Retour</a>
    <h1>Liste des sites</h1>
    <a href="#/siteEdit/create">Creer un nouveau site</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th><th>status</th><th></th>
            </tr>
        </thead>
        <tbody v-for="site in sites">
            <tr>
                <td>{{ site.name }}</td>
                <td>{{ site.status }}</td>
                <td>
                    <a :href="'#/siteEdit/' + site.id">Modifier</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>