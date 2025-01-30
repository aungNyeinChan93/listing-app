<template>
    <div>
        <MyContainer>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4 col-start-5 p-2 ">
                    <UserCard :user="user" />
                </div>
            </div>
            <Link :href="route('home')"><i class="fa-solid fa-home ms-4 text-green-200 hover:text-green-300"> Home </i></Link>
            <button @click="back"> <i class="fa-solid fa-backward ms-4 text-green-200 hover:text-green-300"> Back </i></button>
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

const back =()=>{
    window.history.back();
}
</script>
