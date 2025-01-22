<script setup>
defineProps({
    type:String
});

defineModel({

});

</script>

<template>
    <input :type="type" v-model="form.email" placeholder="Enter Email" class="form-input rounded  w-100">
    <div v-if="errors.email" class="text-sm p-1 text-red-600">{{ errors.email }}</div>
</template>
