<template>
    <div>
        <label for="image" class=" relative">
            <img :src="imagePreview ?? '/storage/images/listings/test.png'" alt="image"
                class="h-[200px] rounded-lg bg-gray-300 w-[400px] mt-2 object-cover object-center border border-blue-300"
                :class="{ '!border border-red-600': error }">

            <button v-if="undoStatus" @click.prevent="undoImage" class=" absolute top-2 end-2 px-2 py-1 rounded-full bg-gray-300 hover:bg-red-200">
                <i class="fa-solid fa-rotate-left"></i>
            </button>
        </label>

        <input @input="imageUpload" type="file" name="image" id="image" class="hidden">


        <pre>
            <!-- {{ currentImage }} -->
        </pre>
    </div>
</template>

<script setup>
import { ref } from 'vue';



const props = defineProps({
    error: String,
    listingImage: String
});

const currentImage = props?.listingImage ? `/storage/${props.listingImage}` : null

const emit = defineEmits(['image'])

const imagePreview = ref(currentImage)

const imageUpload = (e) => {
    undoStatus.value = true
    imagePreview.value = URL.createObjectURL(e.target.files[0])
    emit('image', { image: e.target.files[0] })
}

const undoStatus = ref(false);
const undoImage = (e) => {
    imagePreview.value = currentImage
    undoStatus.value = false
}
</script>
