<script setup>
    let sites = [
    {
        "id": 1,
        "name": "Paris",
        "status": "Siege Administratif"
    },
    {
        "id": 2,
        "name": "Nantes",
        "status": "site de Production"
    },
    {
        "id": 3,
        "name": "Toulouse",
        "status": "site de Production"
    },
    {
        "id": 4,
        "name": "Nice",
        "status": "site de Production"
    },
    {
        "id": 5,
        "name": "Lille",
        "status": "site de Production"
    }
]

</script>

<template>
    <a href="#/">Retour</a>
    <h1>Liste des sites</h1>
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
                    <a href="#/siteEdit">Modifier</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>