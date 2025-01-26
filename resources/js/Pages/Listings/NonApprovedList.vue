<template>
    <div>
        <Head title="Approved List"/>
        <MyContainer>
            <h4 class="text-2xl text-center font-bold p-2">Pending List</h4>
            <ListsCard :listings="listings" routeName="listings.show" />
            <div class="mt-3 text-end px-1">
                <Pagination :links="listings.links"/>
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
