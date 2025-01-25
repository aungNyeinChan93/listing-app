<script setup>
import { useForm } from '@inertiajs/vue3';
import InputField from '../Components/InputField.vue';
import MyContainer from '../Components/MyContainer.vue';

const props = defineProps({
    errors: Object,
    token: String,
    email: String,
})
const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
})

const register = () => {
    form.post(route('password.update'), {
        onError: () => form.reset(['email', 'password', 'password_confirmation'])
    }, {
        preserveState: true
    })
}


</script>

<template>

    <Head title="Password Update" />
    <div class="wrapper w-full h-screen flex justify-center items-center ">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 col-start-3 flex justify-center items-center">
                <form @submit.prevent="register" class="p-8 bg-gray-100 rounded-xl ">
                    <MyContainer>
                        <h1 class="text-center text-xl">Update Password</h1>
                    </MyContainer>
                    <div class="my-2">
                        <InputField type="email" placeholder="Enter Email" v-model="form.email" />
                        <div v-if="errors.email" class="text-sm p-1 text-red-600">{{ errors.email }}</div>
                    </div>
                    <div class="my-2">
                        <InputField type="password" placeholder="Enter Password" v-model="form.password" />
                        <div v-if="errors.password" class="text-sm p-1 text-red-600">{{ errors.password }}</div>
                    </div>
                    <div class="my-2">
                        <InputField type="password" placeholder="Enter Confirm Password"
                            v-model="form.password_confirmation" />
                        <div v-if="errors.password_confirmation" class="text-sm p-1 text-red-600">{{
                            errors.password_confirmation }}</div>
                    </div>
                    <button :disabled="form.processing" type="submit" class="px-4 py-2 rounded bg-gray-500 "
                        :class="{ 'bg-gray-100': form.processing }"><span v-if="form.processing">Update ... </span>
                        <span v-else>Update</span></button>
                </form>
            </div>
        </div>
    </div>
</template>
