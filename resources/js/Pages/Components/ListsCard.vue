<template>
    <section class="bg-white dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 lg:py-4">
            <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                {{ title ?? 'Default Title' }}
            </h2>
            <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                <blockquote v-for="list in listings.data" :key="list.id"
                    class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-4">
                        <img alt=""
                            :src="'https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80'"
                            class="size-14 rounded-full object-cover" />

                        <div>
                            <p class="mt-0.5 text-lg font-medium text-gray-900 hover:text-red-400">
                                <Link :href="route(routeName,list.id)" >{{ list.title }}</Link>
                            </p>
                            <p class="text-green-500 text-sm">{{ list.user.name }}</p>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-700">
                        {{ list.description.substring(0, 100) }}
                    </p>
                </blockquote>
            </div>
        </div>
    </section>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        required: true,
    },
    listings: {
        type: Object,
        required: true,
    },
    routeName: {
        type: String,
        required: true,
    },
});

</script>
