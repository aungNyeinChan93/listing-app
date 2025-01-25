<template>
    <div>

        <Head title="List Detail" />
        <MyContainer>
            <h1 class="font-bold text-xl p-3">Detail List</h1>
            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    <ListCard :listing="listing" routeName="listings.index" />
                </div>
                <div class="flex justify-center items-center ">
                    <img :src="`/storage/${listing.image}` ?? `http://localhost:8000/storage/images/listings/test.png`"
                        class="w-[350px] h-[310px] rounded-lg shadow-md object-cover" alt="test">
                </div>
            </div>
            <div class="mt-4 p-1">
                <Link :href="route('listings.index')" class="btn-primary">Back</Link>
            </div>
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
