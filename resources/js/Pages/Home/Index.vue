<template>
    <div class="mt-5">

        <Head title="Home" />

        <Link :class="{ 'bg-blue-700': $page.component == 'Home/Index' }" :href="route('home')"
            class="px-4 py-2 rounded bg-blue-400 ">
        Home
        </Link>

        <div class="grid grid-cols-12  gap-4 p-2">
            <FlashMessage :message="$page.props.flash.message" :flash="$page.props.flash" />
        </div>

        <MyContainer class="px-10">
            <h1 class="inline">{{ appName }}</h1>
            <span class="ms-2 text-sm">( {{ userName }} )</span>
        </MyContainer>

        <!-- listing section -->
        <div v-if="listings">
            <div v-if="Object.keys(listings?.data).length">
                <MyListings :listings="listings" />
            </div>
        </div>
        <div v-else>
            <MyContainer> Your account has been <em class="text-red-400">suspended !</em> .Please contact with Admin <a
                    class="text-blue-400" href="#">admin@gmial.com</a></MyContainer>
        </div>
        <!--End listing section -->


        <!-- for debug -->
        <pre>
            <!-- {{ Object.keys(listings?.data).length }} -->
        </pre>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import MyContainer from '../Components/MyContainer.vue';
import FlashMessage from '../Components/FlashMessage.vue';
import MyListings from './Sections/MyListings.vue';

const props = defineProps({
    listings: Object,
});
const page = usePage();
// console.log(page.props);

const appName = computed(() => {
    return page.props.app.name;
});
const userName = computed(() => {
    return page.props.auth.user.name;
});
</script>

<style lang="scss" scoped></style>
