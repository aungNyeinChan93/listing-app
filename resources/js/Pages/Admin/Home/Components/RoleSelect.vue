<template>

    <form @change="changeRole">
        <select v-model="form.role" :class="{ '!text-red-400': user?.role == 'suspended' }"
            class="px-2 py-1 border border-green-300 rounded-lg w-[180px] ">

            <option :selected="user.role === 'admin'" value="admin"
                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                role="menuitem">
                Admin
            </option>

            <option :selected="user.role === 'general'" value="general"
                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                role="menuitem">
                General
            </option>

            <option :selected="user.role === 'suspended'" value="suspended"
                class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                role="menuitem">
                Suspended
            </option>

        </select>
    </form>

</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object
})

const form = useForm({
    role: props.user.role,
});

const changeRole = () => {

    confirm(`are you sure change the user role to ${form.role}`)

        ? form.post(route('users.changeRole', props.user?.id))

        : form.role = props.user?.role
}
</script>

<style lang="scss" scoped></style>
