<template>
    <div>
        <Head title="List Detail"/>
        <MyContainer>
            <h1 class="font-bold text-xl p-3">Detail List</h1>
            <ListCard :listing="listing" routeName="listings.index"/>
        </MyContainer>
    </div>
</template>

<script setup>
import MyContainer from '../Components/MyContainer.vue';
import ListCard from '../Components/ListCard.vue';
defineProps({
    listing: {
        type: Object,
        required: true,
    },
});


</script>
