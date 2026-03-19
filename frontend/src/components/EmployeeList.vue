<script setup>
let employees = [
    {
        "id": 1,
        "name": "Jean",
        "firstName": "Jean",
        "phone": "0555555559",
        "email": "jean.jean@boite.fr",
        "service": {
            "id": 2,
            "name": "Production"
        },
        "site": {
            "id": 2,
            "name": "Nantes"
        }
    },
    {
        "id": 2,
        "name": "Dupont",
        "firstName": "Jeanne",
        "phone": "0555555558",
        "email": "jeanne.dupont@site.fr",
        "service": {
            "id": 1,
            "name": "Comptabilité"
        },
        "site": {
            "id": 1,
            "name": "Paris"
        }
    },
    {
        "id": 3,
        "name": "Duchemin",
        "firstName": "Jacques",
        "phone": "0555555557",
        "email": "jacques.duchemin@boite.fr",
        "service": {
            "id": 1,
            "name": "Comptabilité"
        },
        "site": {
            "id": 2,
            "name": "Nantes"
        }
    }
]

</script>
<template>
    <h1>Liste des employées</h1>
    <a href="#/siteList"> Liste des sites</a>
    <table>
        <thead>
            <tr>
                <th></th><th>Nom</th><th>Prénom</th><th>Téléphone</th><th>Email</th><th>Service</th><th>Site</th>

            </tr>
        </thead>
        <tbody v-for="(employee) in employees">
                <tr>
                    <td><a :href="'#/detail/' + employee.id" >Modifier</a></td>
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