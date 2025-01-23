<template>
    <div>
        <head title=" Email Verification"/>
        <MyContainer>
            <h1>Email Verification</h1>
            <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we
                just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            <FlashMessage :message="message" :flash="flash" />
            <Link as="button" method="POST" :href="route('verification.send')"
                class="my-2 px-4 py-1 rounded-lg bg-blue-500 hover:bg-blue-400 mx-1 ">Resend Verification Email</Link>
        </MyContainer>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import MyContainer from "../Components/MyContainer.vue";
import FlashMessage from "../Components/FlashMessage.vue";


defineProps({
    message: String,
    flash: Object,
});



</script>

<style lang="scss" scoped></style>
