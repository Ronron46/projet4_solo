<script setup>
import { ref, computed } from 'vue'
const currentPath = ref(window.location.hash)
let employeeId =  currentPath.value.split("/")[2]
</script>
<template>
    <form>
        <label>
            Nom
            <input>
        </label>
    </form>
</template>