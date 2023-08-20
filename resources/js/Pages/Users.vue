<script setup>
import { defineProps } from 'vue'
import Nav from '../Shared/Nav.vue'
import { Link } from "@inertiajs/vue3";

defineProps({
    time: String
})
</script>

<template>
    <h1 class="text-4xl font-bold">Users</h1>
    <Nav></Nav>

    <div style="margin-top: 1000px">
        <p>The current time is {{ time }}.</p>

        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<style scoped>

</style>
