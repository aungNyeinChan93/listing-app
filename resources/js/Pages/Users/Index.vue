<template>

    <Head title="Users" />
    <MyContainer>
        <div class="grid grid-cols-12">
            <SearchInput class="col-span-3 col-start-10" v-model="search" type="text" label="search" placeholder="serach ... " :action="action" />
        </div>
        <!-- <div v-if="users"> {{ users }}</div> -->
        <UserTable :users="users" routeName='users.show' />
        <div class="pagination text-end mt-3">
            <Pagination :links="users.links" />
        </div>
    </MyContainer>

    <pre>
        <!-- {{ users }} -->
    </pre>

</template>

<script setup>
import MyContainer from "../Components/MyContainer.vue";
import UserTable from "../Components/UserTable.vue";
import Pagination from "../Components/Pagination.vue";
import SearchInput from "../Components/SearchInput.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { throttle } from 'lodash';

const props = defineProps({
    users: {
        type: Object,
        required: true,
    },
    search:String,
});

const search = ref(props.search);

const action = () => {
    router.get('/users', { search: search.value }, { preserveState: true });
};

watch(search, throttle((value) => {
    router.get('/users', { search: value }, { preserveState: true });
}, 500));

</script>
