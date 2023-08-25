<script setup>
    import {useForm} from "@inertiajs/inertia-vue3";

    defineProps({
        layout: null
    })

    let form = useForm({
        email: '',
        password: '',
    });

    let submit = () => {
        form.post('/login');
    }
</script>

<template>
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border">
            <Head title="Login Page"/>
            <h1 class="text-3xl">Login</h1>
            <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
                <div class="mb-6">
                    <label for="email" class="block mb-2 mt-3 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input
                        v-model="form.email"
                        class="border p-2 w-full rounded"
                        type="email"
                        name="email"
                        id="email"
                        required
                    >
                    <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>

                    <label for="password" class="block mb-2 mt-3 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input
                        v-model="form.password"
                        class="border p-2 w-full rounded"
                        type="password"
                        name="password"
                        id="password"
                    >

                    <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>

                </div>
                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                            :disabled="form.processing"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<style scoped>

</style>
