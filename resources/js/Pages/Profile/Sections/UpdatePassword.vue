<template>
    <div>

        <Head title="Update Password" />

        <MyContainer>
            <h1 class="text-center text-2xl font-bold p-2">Update Password</h1>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-2 col-start-2">
                    <form

                        @submit.prevent="form.put(route('profilePassword.update'),
                            { preserveScroll: true, onSuccess: () => form.reset() })">

                        <InputFieldTwo placeholder="Current Password" label="Current Password" type="password"
                            v-model="form.current_password" />
                        <div v-if="form.errors" class="text-sm text-red-600 p-1"> {{ form.errors.current_password }}
                        </div>

                        <InputFieldTwo placeholder="New Password" label="New Password" type="password"
                            v-model="form.password" />
                        <div v-if="form.errors" class="text-sm text-red-600 p-1"> {{ form.errors.password }} </div>

                        <InputFieldTwo placeholder="Confirm Password" label="Confirm Password" type="password"
                            v-model="form.password_confirmation" />
                        <div v-if="form.errors" class="text-sm text-red-600 p-1"> {{ form.errors.password_confirmation
                            }} </div>

                        <div v-if="form.recentlySuccessful" >
                            <p class="text-sm text-green-600 p-1">Saved!</p>
                        </div>

                        <button type="submit" :disabled="form.processing"
                            class="btn btn-primary px-4 py-2 text-white bg-blue-600 hover:bg-blue-300 rounded-md ">Update
                        </button>
                    </form>
                    <Link :href="route('home')" class="text-blue-500 float-end text-sm p-2">Back</Link>
                </div>
            </div>
        </MyContainer>

    </div>
</template>

<script setup>
import MyContainer from '../../Components/MyContainer.vue';
import InputFieldTwo from '../../Components/InputFieldTwo.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});
</script>

<style lang="scss" scoped></style>
