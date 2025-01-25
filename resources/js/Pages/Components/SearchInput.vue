<template>
    <div class="relative">
        <label :for="label" class="sr-only"> {{ label }} </label>

        <input :type="type" :placeholder="placeholder" v-model="model"
            class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />

        <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
            <button @click="action" type="button" class="text-gray-600 hover:text-gray-700">
                <span class="sr-only">{{ label }}</span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </span>
    </div>
</template>

<script setup>
defineProps({
    label: String,
    placeholder: String,
    type: String,
    action: Function,
})

const model=defineModel();
</script>

<style scoped>
    input[type] {
      color: black;
    }
</style>
