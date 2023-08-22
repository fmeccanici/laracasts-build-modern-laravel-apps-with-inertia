<script setup>
import {defineProps} from 'vue'
import Nav from '../Shared/Nav.vue'

defineProps({})
</script>

<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <h1 class="font-bold text-lg">My App</h1>
            <Nav/>
        </header>
    </section>

    <section class="p-8">
        <div class="max-w-3xl mx-auto">
            <slot/>
        </div>
    </section>
</template>

<style scoped>

</style>
