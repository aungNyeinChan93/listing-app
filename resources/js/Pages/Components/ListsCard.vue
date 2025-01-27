<template>
    <section class="bg-white dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 lg:px-8 lg:py-4">

            <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                <blockquote v-for="list in listings.data" :key="list.id"
                    class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-4">
                        <img alt=""
                            :src="list.image ? `/storage/${list.image}` :`/storage/images/listings/test.png`"
                            class="!size-14 rounded-full object-contain object-center " />

                        <div>
                            <p class="mt-0.5 text-lg font-medium text-gray-900 hover:text-red-400">
                                <Link :href="route(routeName, list.id)">{{ list.title }}</Link>
                            </p>
                            <p @click="userFilter(list.user_id)" class="text-green-500 hover:text-red-400 text-sm">{{
                                list.user.name }}</p>
                        </div>
                    </div>


                    <!-- tags -->
                    <div v-if="list.tags" class="flex justify-start space-x-3 items-center py-2 mt-2 ">
                        <div @click="tagFilter(tag)" class="badge" v-for="tag in list.tags.split(',')" :key="tag">{{ tag
                            }}</div>
                    </div>

                    <!-- desc -->
                    <p class="mt-2 text-gray-700 ">
                        {{ list.description.substring(0, 100) + " . . . " }}
                    </p>

                </blockquote>
            </div>
        </div>
    </section>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link, router } from '@inertiajs/vue3';

defineProps({
    listings: {
        type: Object,
        required: true,
    },
    routeName: {
        type: String,
        required: true,
    },
});

const params = route().params;

const userFilter = (id) => {
    router.get(route('listings.index'), { user_id: id, search: params.search, tag: params.tag }, {
        // preserveState: true,
    })
}

const tagFilter = (tag) => {
    router.get(route('listings.index'), { tag: tag, user_id: params.user_id, search: params.search })
}

</script>
