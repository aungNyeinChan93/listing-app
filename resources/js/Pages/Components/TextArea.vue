<template>

    <div>
        <!-- <label for="OrderNotes" class="block text-sm font-medium text-gray-700"> Order notes </label> -->

        <textarea v-model="model" id="OrderNotes"
            class="mt-2 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="9"
            :placeholder="placeholder"></textarea>
    </div>
</template>

<script setup>

defineProps({
    // label: String,
    placeholder: String,

})

const model = defineModel();
</script>
