<script setup>
import { defineProps } from 'vue'
import Nav from '../Shared/Nav.vue'
import { Link } from "@inertiajs/vue3";
import Layout from "../Shared/Layout.vue";

defineProps({
    time: String
})
</script>

<template>
    <Layout>
        <h1 class="text-3xl">Users</h1>

        <div style="margin-top: 1000px">
            <p>The current time is {{ time }}.</p>

            <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
        </div>
    </Layout>
</template>

<style scoped>

</style>
