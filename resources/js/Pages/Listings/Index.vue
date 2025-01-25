<template>

    <Head title="Listing " />
    <div>
        <MyContainer>
            <div class="grid gap-4">
                <div v-if="Object.keys(listings.data).length">
                    <ListsCard :listings="listings" title="Listing Lists" routeName="listings.show" />
                    <div class="text-end mt-4">
                        <Pagination :links="listings.links" />
                    </div>
                </div>
                <div v-else>
                    <MyContainer>
                        <p class="text-lg font-bold text-center text-red-500">Empty List <i class="fa-solid fa-list"></i></p>
                    </MyContainer>
                </div>
            </div>
        </MyContainer>
    </div>

</template>

<script setup>
import MyContainer from "../Components/MyContainer.vue";
import ListsCard from "../Components/ListsCard.vue";
import Pagination from "../Components/Pagination.vue";

const props = defineProps({
    listings: {
        type: Object,
        required: true,
    },
});
</script>

<style lang="scss" scoped></style>
