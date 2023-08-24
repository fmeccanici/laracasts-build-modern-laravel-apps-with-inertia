<script setup>

import {Link} from "@inertiajs/vue3";
import Pagination from "../Shared/Pagination.vue";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    users: Object,
    filters: Object
})

let search = ref(props.filters.search);

watch(search, value => {
    Inertia.get('/users', {
        search: value,
    }, {
        replace: true,
        preserveState: true,
    });
})
</script>

<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="flex justify-between mb-6">
        <h1 class="text-3xl">Users</h1>

        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg">
    </div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <tbody class="divide-y divide-gray-200 bg-white">
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ user.name }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                            <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </Link>
                        </td>
                    </tr>

                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>

        <!--Paginator-->
        <Pagination class="mt-3" :links="users.links"/>
    </div>

</template>

<style scoped>

</style>
