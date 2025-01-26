<template>
    <div>
        <Head title="Listing Create" />
        <MyContainer>
            <h3 class="text-2xl text-center p-2 font-bold">Listing Create</h3>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-4 col-start-2">
                    <form @submit.prevent="create" class="grid grid-cols-2 gap-x-4 ">
                        <div class="">
                            <InputFieldTwo label="title" placeholder="title" type="text" v-model="form.title" />
                            <InputFieldTwo label="tags" placeholder="tags (seperate with comma eg 1,2,3)" type="text"
                                v-model="form.tags" />
                        </div>
                        <div class="">
                            <InputFieldTwo lebel="email" placeholder="email" v-model="form.email" />
                            <InputFieldTwo label="link" placeholder="link" v-model="form.link" />
                        </div>
                        <div>
                            <TextArea placeholder="Enter Desc ... " v-model="form.description" />
                        </div>
                        <div>
                            <ImageUpload :error="form.errors.image" @image="(e) => form.image = e.image" />
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </MyContainer>
    </div>
</template>

<script setup>
import MyContainer from '../Components/MyContainer.vue';
import InputFieldTwo from '../Components/InputFieldTwo.vue'
import { useForm } from '@inertiajs/vue3';
import TextArea from '../Components/TextArea.vue';
import ImageUpload from '../Components/ImageUpload.vue';

defineProps({

});

const form = useForm({
    title: null,
    description: null,
    email: null,
    tags: null,
    link: null,
    image: null,
});

const create =()=>{
    console.log(form);

}

</script>

<style lang="scss" scoped></style>
