<template>
    <div>
        <Head title="Pending List"/>
        <MyContainer>
            <h4 class="text-2xl text-center font-bold p-2">Pending List</h4>
            <div v-if="Object.keys(listings.data).length">
                <ListsCard :listings="listings" routeName="listings.show" />
                <div class="mt-3 text-end px-1">
                    <Pagination :links="listings.links"/>
                </div>
            </div>
            <div v-else>
                <p class="text-xl font-bold text-red-500/90 p-3 text-center "> Empty List</p>
            </div>
            <Link as="button" :href="route('listings.index')" class="block w-[100px] text-center btn-primary mt-3">Back</Link>
        </MyContainer>

    </div>
</template>

<script setup>
import MyContainer from '../Components/MyContainer.vue';
import ListsCard from '../Components/ListsCard.vue';
import Pagination from '../Components/Pagination.vue';

const params = route().params;

defineProps({
    listings: {
        type: Object,
        required: true
    }
});


</script>

<style lang="scss" scoped></style>
