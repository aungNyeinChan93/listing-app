<template>
    <div>
        <label for="image">
            <img :src="imagePreview ?? '/storage/images/listings/test.png'" alt="image"
                class="h-[200px] rounded-lg bg-gray-300 w-[400px] mt-2 object-cover object-center"
                :class="{ '!border border-red-600': error }">
        </label>

        <input @input="imageUpload" type="file" name="image" id="image" class="hidden">
    </div>
</template>

<script setup>
import { ref } from 'vue';

defineProps({
    error: String
});

const emit = defineEmits(['image'])

const imagePreview = ref(null)


const imageUpload = (e) => {
    // console.log(e.target.files[0]);
    imagePreview.value = URL.createObjectURL(e.target.files[0])
    emit('image',{image: e.target.files[0]})
}
</script>
