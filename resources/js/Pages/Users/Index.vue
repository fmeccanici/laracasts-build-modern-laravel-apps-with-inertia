<script setup>

import {Link} from "@inertiajs/vue3";
import Pagination from "../../Shared/Pagination.vue";
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import throttle from "lodash.throttle";
import debounce from "lodash.debounce";

let props = defineProps({
    users: Object,
    filters: Object,
    can: Object
})

let search = ref(props.filters.search);

watch(search, debounce(function (value) {
    Inertia.get('/users', {
        search: value,
    }, {
        replace: true,
        preserveState: true,
    });
}, 300));
</script>

<template>
    <Head>
        <title>Users</title>
    </Head>

    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>

            <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-4">New User</Link>
        </div>

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

                        <td v-if="user.can.edit" class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
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
