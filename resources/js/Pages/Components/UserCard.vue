<template>
    <a href="#" class="group block">
        <div class="relative h-[350px] sm:h-[450px]">
            <img src="https://images.unsplash.com/photo-1592921870789-04563d55041c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                alt="" class="absolute inset-0 h-full w-full object-cover opacity-100 group-hover:opacity-0" />

            <img src="https://images.unsplash.com/photo-1594385208974-2e75f8d7bb48?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                alt="" class="absolute inset-0 h-full w-full object-cover opacity-0 group-hover:opacity-100" />

            <img src="https://images.unsplash.com/photo-1594385208974-2e75f8d7bb48?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                alt="" class="absolute inset-0 h-full w-full object-cover opacity-0 group-hover:opacity-100" />
        </div>

        <div class="mt-3">
            <h3 class="text-sm text-gray-700 group-hover:underline group-hover:underline-offset-4">
                {{ user.name }}
            </h3>

            <p class="mt-1.5 text-pretty text-xs text-gray-500">
                {{ user.email }}
            </p>
        </div>
    </a>
</template>

<script setup>
defineProps({
    user: {
        type: Object,
        required: true
    }
});
</script>
