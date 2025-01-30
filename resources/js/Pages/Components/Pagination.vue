<template>


    <component :is="link.url ? 'Link' : 'span'"
        v-for="link in links" :key="link.label" :href="link.url"
        v-html="link.label" class="px-2 py-1 rounded-lg  mx-1"
        :class="{ 'bg-red-400': link.active, 'bg-gray-200 ': !link.url, 'bg-gray-400': link.url }"
        />


</template>

<script setup>
defineProps({
    links: {
        type: Object,
        required: true,
    }
});
</script>

<style lang="scss" scoped>

</style>
