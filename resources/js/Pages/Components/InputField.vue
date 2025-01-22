<script setup>
defineProps({
    type:String,
    placeholder:String,
    // error:Object,
});

const model = defineModel();

</script>

<template>
    <input :type="type" v-model="model" :placeholder="placeholder" class="form-input rounded w-100">
    <!-- <div v-if="errors.placeholder" class="text-sm p-1 text-red-600">{{ errors.placeholder }}</div> -->
</template>
