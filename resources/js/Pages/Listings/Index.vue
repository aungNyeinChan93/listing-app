<template>

    <Head title="Listing " />
    <div>
        <MyContainer>
            <div class="grid gap-4">
                <ListsCard :listings="listings" title="Listing Lists" routeName="listings.show"/>

                <div class="text-end">
                    <Pagination :links="listings.links"/>
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
