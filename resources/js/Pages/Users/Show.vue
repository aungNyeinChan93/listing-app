<template>
    <div>
        <MyContainer>
            {{ user.name }}
        </MyContainer>
    </div>
</template>

<script setup>
import MyContainer from "../Components/MyContainer.vue";

defineProps({
    user: {
        type: Object,
        required: true
    }
});
</script>
