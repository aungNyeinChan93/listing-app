<template>

    <MyContainer>
        <Title class="px-5">Users Section</Title>

        <!-- filter section -->
        <div class="flex justify-between items-center  px-5">
            <div class="flex items-center gap-4 justify-center">
                <p class="font-bold px-2 py-1 mt-1 bg-green-300 rounded-lg text-slate-600">Total User ({{
                    users.data.length }})
                </p>
                <div :class="{'!bg-green-300':params.role == 'suspended'}" class="mt-1 px-2 py-1 border rounded-lg border-blue-400 bg-green-100/50">
                    <input type="checkbox" :checked="params.role == 'suspended'" class="rounded-full text-sm " id="suspended" hidden
                        @input="suspended">
                    <label for="suspended" class="ms-3 text-sm">Suspended User</label>
                </div>
            </div>

            <div class="flex item-center justify-between">
                <div class="mt-2 mx-2">
                    <Link v-if="params.search" class="badge ms-1"
                        :href="route('admins.index', { ...params, search: null })">
                    {{
                        params.search }} <i class="fa-solid fa-xmark ms-1 text-sm"></i></Link>
                </div>
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
        <!-- filter section end-->


        <div v-if="Object.keys(users?.data).length">
            <UserTable :users="users?.data" />
        </div>
        <div v-else>
            <MyContainer>Nothing User</MyContainer>
        </div>

        <MyContainer class="text-end text-xs border !border-green-200 mx-4">
            <Pagination :links="users?.links" />
        </MyContainer>
    </MyContainer>

    <pre>
        <!-- {{ role }} -->

        <input type="text" name="" id="" @input="text" >
        <input type="checkbox" name="" id="" @input="checkbox" >
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
    role: String,
});

const form = useForm({
    search: props.search,
    role: props.role ?? 'all'
})

const params = route().params;

watch(form, throttle((value) => {
    router.get(route('admins.index', { search: value.search, role: form.role }, {
        // preserState: true,
    }))
}, 500))

const filterByRole = () => {
    // console.log(form.role);
    router.get(route('admins.index', { role: form.role, ...params }, {
        // preserState: true,
    }))
}

const suspended = (e) => {
    if (e.target.checked) {
        router.get(route('admins.index', {
            ...params,
            role: 'suspended'
        }))
    } else {
        router.get(route('admins.index', {
            ...params,
            role: null
        }))
    }
}

function text(e){
    console.log('test',e,e.data,e.target.value);
}
function checkbox(e){
    console.log(e);
}

</script>


<style scoped>
select {
    color: black;
}
</style>
