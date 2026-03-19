<script setup>
    let services = [
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
                <td><a href="#/serviceEdit">Modifier</a></td>
            </tr>
        </tbody>
    </table>
</template>