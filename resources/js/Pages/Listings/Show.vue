<template>
    <div>

        <Head title="List Detail" />
        <MyContainer class="px-10">
            <h1 class="font-bold text-xl p-3">Detail List</h1>
            <div class="grid grid-cols-3 ">
                <div class="col-span-2 ">
                    <ListCard :listing="listing" routeName="listings.index" />
                </div>
                <div class="flex justify-center items-center   ">
                    <img :src="`/storage/${listing.image}` ?? `http://localhost:8000/storage/images/listings/test.png`"
                        class="w-[350px] h-[310px] rounded-lg shadow-md object-cover" alt="test">
                </div>
            </div>
            <div class="mt-4 p-1">
                <button @click="back" class="btn-primary">Back</button>
                <!-- <Link as="button" :href="route('listings.index')" class="btn-primary">Back</Link> -->
                <Link as="button" v-if="user.id == listing.user_id || canEdit" :href="route('listings.edit', listing.id)"
                    class="btn-primary !bg-yellow-400">Edit</Link>
                <Link as="button" v-if="user.id == listing.user_id || canDelete" method="delete"
                    :href="route('listings.destroy', listing.id)" class="btn-primary !bg-red-400">Delete</Link>
            </div>

            <!-- for debug -->
            <pre>
                <!-- {{ listing }} -->
                  <!-- {{ user }} -->
                    <!-- {{ canEdit }} -->
                      <!-- {{ canDelete }} -->
            </pre>
        </MyContainer>

    </div>
</template>

<script setup>
import MyContainer from '../Components/MyContainer.vue';
import ListCard from '../Components/ListCard.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

defineProps({
    listing: {
        type: Object,
        required: true,
    },
    canEdit: {
        type: Boolean
    },
    canDelete: Boolean
});

const page = usePage();
const user = computed(() => page.props.auth.user)

const back =() => window.history.back();

</script>
