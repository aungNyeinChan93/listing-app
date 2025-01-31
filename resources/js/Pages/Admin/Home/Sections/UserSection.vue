<template>

    <MyContainer>
        <Title class="px-5">Users Section</Title>
        <div class="flex justify-between items-center  px-5">
            <div>
                <p class="font-bold px-2 py-1 mt-1 bg-green-300 rounded-lg text-slate-600">Total User ({{ users.data.length }}) </p>
            </div>
            <div class="flex">
                <div>
                    <form @submit.prevent="filterByRole">
                        <select v-model="form.role" class="w-100px mx-2 rounded-lg border border-green-600">
                            <option value="all" :selected="!form.role">All</option>
                            <option value="admin">Admin</option>
                            <option value="general">General</option>
                            <option value="suspended">Suspended</option>
                        </select>
                    </form>
                </div>

                <div>
                    <SearchInput label="search" placeholder="search" type="text" v-model="form.search" />
                </div>

            </div>
        </div>
        <div v-if="Object.keys(users?.data).length">
            <UserTable :users="users?.data" />
        </div>
        <div v-else>
            <MyContainer>Nothing User</MyContainer>
        </div>
        <MyContainer class="text-end text-xs border !border-green-200">
            <Pagination :links="users?.links" />
        </MyContainer>
    </MyContainer>

    <pre>
        <!-- {{ role }} -->
    </pre>

</template>

<script setup>
import MyContainer from '../../../Components/MyContainer.vue';
import Title from '../../../Components/Title.vue';
import UserTable from '../Components/UserTable.vue';
import Pagination from '../../../Components/Pagination.vue';
import SearchInput from '../../../Components/SearchInput.vue';
import { router, useForm } from '@inertiajs/vue3';
import { watch } from 'vue';
import { throttle } from 'lodash'

const props = defineProps({
    users: Object,
    search: String,
    role:String,
});

const form = useForm({
    search: props.search,
    role: props.role ?? 'all'
})

const params = route().params;

watch(form, throttle((value) => {
    router.get(route('admins.index', { search: value.search, role: form.role }, {
        preserState: true,
    }))
}, 500))

const filterByRole = () => {
    // console.log(form.role);
    router.get(route('admins.index', { role: form.role, ...params }, {
        preserState: true,
    }))
}
</script>


<style scoped>
select {
    color: black;
}
</style>
