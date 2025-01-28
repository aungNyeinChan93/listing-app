<template>

    <Head title="My Listings Section" />
    <MyContainer class="px-10" >
        <h1 class="text-xl font-bold p-2">My Listings ({{  listings.total  }})</h1>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 place-items-center gap-x-8">
            <div v-for="listing in listings.data" :key="listing.id">
                <Cards :listing="listing"/>
            </div>
        </div>
        <div>
            <Pagination :links="listings.links"/>
        </div>
    </MyContainer>
    <!-- <pre>{{ listings }}</pre> -->
</template>

<script setup>
import MyContainer from '../../Components/MyContainer.vue';
import Cards from '../HomeComponent/Cards.vue';
import Pagination from '../../Components/Pagination.vue'

defineProps(["listings"]);


</script>

<style lang="scss" scoped></style>
