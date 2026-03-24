<script setup>
import { AuthService} from "../services/AuthService"
import { ref} from 'vue'
import { User } from "../services/User";
let user = ref(new User)
let error = ref('')
function send() {
    let token = AuthService.login(user.value);
    if (token == 'error') {
        error.value = "bad-login"
    } else {
        setTimeout(() => {
    window.location.replace('#/')}, "300")
    }
}
</script>

<template>
    <a href="#/"> retour</a>
    <h1>Login</h1>
    <div v-if="error == 'bad-login'" style="color: red;">
        Mauvais login ou mot de passe
    </div>
    <form @submit.prevent="submit">
        <label>
            Nom d'utilisateur
            <input v-model="user.userName">
        </label>
        <br>
        <label>
            mot de passe
            <input v-model="user.passwd">
        </label>
        <button @click="send()">Valider</button>
    </form>
</template>
