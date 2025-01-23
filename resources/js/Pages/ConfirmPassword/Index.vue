<script setup>
import { useForm } from '@inertiajs/vue3';
import MyContainer from '../Components/MyContainer.vue';
import InputField from '../Components/InputField.vue';
import FlashMessage from '../Components/FlashMessage.vue';

defineProps({
    errors: Object,
})
const form = useForm({
    password: '',
})

const confirmPassword = () => {
    form.post(route('password.store'), {
        onError: () => form.reset('password'),
    })
}


</script>

<template>

    <Head title="Confirm Password" />

    <div class="wrapper w-full h-screen flex justify-center items-center ">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-8 col-start-3 flex justify-center items-center">
                <form @submit.prevent="confirmPassword" class="p-8 bg-gray-100 rounded-xl  ">
                    <MyContainer>
                        <h1 class="text-center text-xl">Confrim Password</h1>
                    </MyContainer>

                    <div class="my-2">
                        <InputField type="password" placeholder="Enter Password" v-model="form.password" />
                        <div v-if="errors.password" class="text-sm p-1 text-red-600">{{ errors.password }}</div>
                    </div>

                    <button :disabled="form.processing" type="submit" class="px-4 py-2 rounded bg-red-300 "
                        :class="{ 'bg-red-100': form.processing }"><span v-if="form.processing">Confirm ... </span>
                        <span v-else>Confirm</span></button>
                </form>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped></style>
