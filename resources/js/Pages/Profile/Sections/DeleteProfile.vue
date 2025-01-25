<template>
    <div>
        <Head title="Delete Profile" />
        <MyContainer>
            <h1 class="text-center text-2xl p-1 font-bold">Delete Account</h1>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-2 col-start-2">
                    <div v-if="show">
                        <form @submit.prevent="submit">
                            <InputFieldTwo type="password" placeholder="Password" label="Password"
                                v-model="form.password" />
                            <div class="text-sm text-red-600 p-1" v-if="form.errors">{{ form.errors.password }}</div>
                            <button type="submit"
                            :disabled="form.processing"
                            :class="{'bg-red-200':form.processing, 'bg-red-600':!form.processing}"
                                class="btn btn-primary px-4 py-2 text-white bg-red-600 hover:bg-red-300 rounded-md">Delete
                            </button>
                            <button @click="show = false" class="ps-3 text-blue-400 text-sm">Cancle</button>
                        </form>
                    </div>
                    <div v-else>
                        <button @click="show = true" class="bg-red-600 px-4 py-2 rounded-lg text-white">Delete
                            Account</button>
                    </div>
                </div>
            </div>
        </MyContainer>
    </div>
</template>

<script setup>
import MyContainer from '../../Components/MyContainer.vue';
import InputFieldTwo from '../../Components/InputFieldTwo.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const show = ref(false);
const form = useForm({
    password: ''
});

const submit = () => {
    confirm('Are you sure you want to delete your account?');
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => form.reset()
    });
}


</script>

<style lang="scss" scoped></style>
