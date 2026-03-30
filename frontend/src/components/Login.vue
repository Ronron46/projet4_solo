<script setup>
import { AuthService} from "../services/AuthService"
import { ref} from 'vue'
import { User } from "../services/User";
let user = ref(new User)
let error = ref('')
async function send() {
    let token = await AuthService.login(user.value);
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
    <form v-on:submit.prevent="send()">
        <label>
            Nom d'utilisateur
            <input required type="email" v-model="user.userName">
        </label>
        <br>
        <label>
            mot de passe
            <input required type="password" v-model="user.passwd">
        </label>
        <br>
        <button type="submit">Valider</button>
    </form>
</template>
