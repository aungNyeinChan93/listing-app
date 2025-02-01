<template>
    <div v-if="flash.message" class="col-span-12 my-3 rounded-lg px-4 p-2 bg-green-400 text-xl ">
        {{ message }}
        <button @click.prevent="flash.message = null " class="px-2 float-end">X</button>
    </div>
</template>

<script setup>
defineProps({
    message: String,
    flash: Object,
});

</script>
