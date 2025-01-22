<template>
    <Link v-for="link in links" :key="link.label" :href="link.url" v-html="link.label"
        class="px-2 py-1 rounded-lg bg-gray-400 mx-1" :class="{ 'bg-red-400': link.active }" />
</template>

<script setup>
defineProps({
    links: {
        type: Object,
        required: true,
    }
});
</script>

<style lang="scss" scoped></style>
