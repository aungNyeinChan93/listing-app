<template>
    <div>

        <Head title="Profile Update" />
        <MyContainer class="my-4">
            <h1 class="text-center p-2 text-2xl font-bold p-2"> Update Profile</h1>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-2 col-start-2">

                    <form @click.prevent="submit">
                        <InputFieldTwo label="Name" type="text" placeholder="Name" v-model="form.name" />
                        <div class="text-xs text-red-400 p-1" v-if="form.errors">{{ form.errors.name }}</div>
                        <InputFieldTwo label="Email" type="email" placeholder="Email" v-model="form.email" />
                        <div class="text-xs text-red-400 p-1" v-if="form.errors">{{ form.errors.email }}</div>
                        <button :disabled="form.processing" :class="{ 'bg-blue-300': form.processing }" type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md">Update</button>
                    </form>

                    <div class="p-2 float-end mt-5">
                        <Link as="button" :href="route('home')" class="text-blue-400 text-sm">Back</Link>
                    </div>

                    <div v-if="!user.email_verified_at">
                        <p class="p-2">Your email is not verificated. Please verify your email.
                            <Link :class="{ 'text-green-400': form.processing }" as="button" method="POST"
                                :href="route('verification.send')" class="text-red-400 text-xs">Click here</Link>
                        </p>
                    </div>

                </div>
            </div>
        </MyContainer>
    </div>
</template>

<script setup>
import MyContainer from "../../Components/MyContainer.vue";
import InputFieldTwo from "../../Components/InputFieldTwo.vue";
import { Link, useForm } from "@inertiajs/vue3";
import FlashMessage from "../../Components/FlashMessage.vue";

const props = defineProps({
    user: Object,

});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const submit = () => {
    form.patch(route('profile.update'), {
        onStart: () => console.log('start'),
    });
}

</script>
