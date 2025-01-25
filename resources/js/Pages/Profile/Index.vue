<template>

    <Head title="Profile" />
    <div class="profile-index">
        <FlashMessage :message="flash.message" :flash="flash" />
        <UpdateProfile :user="user" :flash="flash" />
        <UpdatePassword />
        <DeleteProfile />
    </div>
</template>

<script setup>
import UpdateProfile from './Sections/UpdateProfile.vue';
import UpdatePassword from './Sections/UpdatePassword.vue';
import DeleteProfile from './Sections/DeleteProfile.vue';
import FlashMessage from '../Components/FlashMessage.vue';

const props = defineProps({
    user: Object,
    flash: Object
});
</script>

<style lang="scss" scoped></style>
