<script setup>
import { getServices } from '../repository/ServiceRepository';

    let services = await getServices()
</script>

<template>
    <a href="#/">Retour</a>
    <h1>Liste des Services</h1>
    <table style="width: 50%; margin-inline: auto;">
        <thead>
            <tr>
                <th>Nom</th><th></th>
            </tr>
        </thead>
        <tbody v-for="service in services">
            <tr>
                <td>{{ service.name }}</td>
                <td><a :href="'#/serviceEdit/' + service.id">Modifier</a></td>
            </tr>
        </tbody>
    </table>
</template>