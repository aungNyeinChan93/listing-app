<template>
    <div>

        <Head title="Listing Edit" />
        <MyContainer>
            <h3 class="text-2xl text-center p-2 font-bold">Listing Edit</h3>
            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-4 col-start-2">

                    <!-- error message -->
                    <div v-if="Object.keys(form.errors).length " class="flex justify-between p-2 bg-red-100/50 rounded-lg">
                        <ul >
                           <li v-for="error in form.errors" :key="error" class="text-sm text-red-400 p-1 ">{{ error }}</li>
                        </ul>
                        <div>
                            <button @click="()=> form.errors = ''">X</button>
                        </div>
                    </div>

                    <form  @submit.prevent="update" class="grid grid-cols-2 gap-x-4 ">
                        <div class="">
                            <InputFieldTwo label="title" placeholder="title" type="text" v-model="form.title" />
                            <InputFieldTwo label="tags" placeholder="tags  (seperate with comma eg 1,2,3)" type="text"
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
                            <ImageUpload :listingImage="listing.image" :error="form.errors.image" @image="(e) => form.image = e.image" />
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn-primary">Update</button>
                            <Link as="button" :href="route('listings.index')" class="btn-primary !bg-gray-400"> Back</Link>
                        </div>
                    </form>

                    <pre>
                        <!-- {{ listing }} -->
                    </pre>
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

const props = defineProps({
    listing:Object,
});



const form = useForm({
    title: props.listing.title,
    description: props.listing.description,
    email: props.listing.email,
    tags: props.listing.tags,
    link: props.listing.link,
    image: null,
    _method:'PATCH'
});

const update = () => {
    form.post(route('listings.update',props.listing.id), {
        // preserveState: true,
        // onError: () => form.reset(),
    });
}

</script>

<style lang="scss" scoped></style>
