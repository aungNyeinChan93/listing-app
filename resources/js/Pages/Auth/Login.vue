<script setup>
import { useForm } from '@inertiajs/vue3';
import MyContainer from '../Components/MyContainer.vue';
import InputField from '../Components/InputField.vue';

defineProps({
    errors: Object
})
const form = useForm({
    email: '',
    password: '',
})

const login = () => {
    form.post('login', {
        onError: () => form.reset('email'),
    })
}


</script>

<template>

    <Head title="login" />

    <div class="wrapper w-full h-screen flex justify-center items-center ">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 col-start-3 flex justify-center items-center">
                <form @submit.prevent="login" class="p-8 bg-gray-100 rounded-xl  ">
                    <MyContainer>
                        <h1 class="text-center text-xl">Login Form</h1>
                    </MyContainer>

                    <div class="my-2">
                        <InputField type="email" placeholder="Enter Email" v-model="form.email" />
                        <div v-if="errors.email" class="text-sm p-1 text-red-600">{{ errors.email }}</div>
                    </div>

                    <div class="my-2">
                        <InputField type="password" placeholder="Enter Password" v-model="form.password" />
                        <div v-if="errors.password" class="text-sm p-1 text-red-600">{{ errors.password }}</div>
                    </div>

                    <button :disabled="form.processing" type="submit" class="px-4 py-2 rounded bg-red-300 "
                        :class="{ 'bg-red-100': form.processing }"><span v-if="form.processing">Login ... </span>
                        <span v-else>Login</span></button>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped></style>
