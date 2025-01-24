<template>
    <Head title="Profile"/>
    <div class="profile-index">
        <FlashMessage :message="success" :flash="flash" />
        <Update :user="user"/>
    </div>
</template>

<script setup>
import Update from './Sections/update.vue';
import FlashMessage from '../Components/FlashMessage.vue';

const props = defineProps({
    user: Object,
    success:String,
    flash:Object
});
</script>

<style lang="scss" scoped>

</style>
