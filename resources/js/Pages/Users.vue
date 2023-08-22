<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    time: String,
})
</script>

<script>
import Layout from '../Shared/Layout.vue'
export default { layout: Layout };

</script>
<template>
    <h1 class="text-3xl">Users</h1>

    <div style="margin-top: 1000px">
        <p>The current time is {{ time }}.</p>

        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<style scoped>

</style>
