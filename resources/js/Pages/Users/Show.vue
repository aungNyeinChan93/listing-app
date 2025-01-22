<template>
    <div>
        <MyContainer>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4 col-start-5 p-2 ">
                    <UserCard :user="user" />
                </div>
            </div>
            <Link :href="route('home')"> Back</Link>
        </MyContainer>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import MyContainer from "../Components/MyContainer.vue";
import UserCard from "../Components/UserCard.vue";

defineProps({
    user: {
        type: Object,
        required: true
    }
});
</script>
