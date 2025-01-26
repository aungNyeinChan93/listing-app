<template>
    <div class="my-2">
        <label :for="label" class="relative block overflow-hidden rounded-md border
         border-gray-200 px-3 pt-3 shadow-sm focus-within:border-blue-600 focus-within:ring-1
          focus-within:ring-blue-600">
            <input :type="type" id="UserEmail" :placeholder="placeholder" v-model="model"
                class="peer h-8 w-full border-none bg-transparent p-0 placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />

            <span
                class="absolute start-3 top-3 -translate-y-1/2 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-3 peer-focus:text-xs">
                {{ placeholder }}
            </span>
        </label>
    </div>
</template>


<script setup>

defineProps({
    label: String,
    type: String,
    placeholder: String,
});

const model = defineModel();

</script>
