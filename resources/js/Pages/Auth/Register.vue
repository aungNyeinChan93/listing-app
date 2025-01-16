<script setup>
import { useForm } from '@inertiajs/vue3';

defineProps({
    errors: Object
})
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const register = () => {
    form.post(route('register.store'), {
        onError: () => form.reset(['name', 'email', 'password', 'password_confirmation'])
    }, {
        preserveState: true
    })
}


</script>

<template>

    <Head title="Register" />
    <div class="wrapper w-full h-screen flex justify-center items-center ">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 col-start-3 flex justify-center items-center">
                <form @submit.prevent="register" class="p-8 bg-gray-100 rounded-xl ">
                    <div class="my-2">
                        <input type="text" v-model="form.name" placeholder="Enter Name"
                            class="form-input rounded  w-100">
                        <div v-if="errors" class="text-sm p-1 text-red-600">{{ errors.name }}</div>
                    </div>
                    <div class="my-2">
                        <input type="email" v-model="form.email" placeholder="Enter Email"
                            class="form-input rounded  w-100">
                        <div v-if="errors.name" class="text-sm p-1 text-red-600">{{ errors.email }}</div>
                    </div>
                    <div class="my-2">
                        <input type="password" v-model="form.password" placeholder="Enter Password"
                            class="form-input rounded  w-100">
                        <div v-if="errors.name" class="text-sm p-1 text-red-600">{{ errors.password }}</div>
                    </div>
                    <div class="my-2">
                        <input type="password" v-model="form.password_confirmation" placeholder="Enter Confirm Password"
                            class="form-input rounded  w-100">
                        <div v-if="errors.name" class="text-sm p-1 text-red-600">{{ errors.password_confirmation }}</div>
                    </div>
                    <button :disabled="form.processing" type="submit" class="px-4 py-2 rounded bg-red-300 "
                        :class="{ 'bg-red-100': form.processing }"><span v-if="form.processing">Register ... </span>
                        <span v-else>Register</span></button>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped></style>
