<template>

    <Head title="User Lists" />

    <MyContainer>

        <Title>{{ user.name.toUpperCase() }} LISTINGS</Title>

        <!-- flash session -->
        <div v-if="flash">
            <FlashMessage :message="flash.message" :flash="flash" />
        </div>

        <!-- filter section -->
        <div class="flex justify-between items-center px-2 my-4">
            <div class="flex justify-start items-center  space-x-3">
                <Link hidden :class="{ '!bg-red-400': $page.url === `/users/${user?.id}/lists?status=approve` }"
                    as="button" :href="`/users/${user?.id}/lists?status=approve`" class="btn-primary me-1">Approved List
                </Link>
                <Link hidden :class="{ '!bg-red-400': params.status == 'pending' }" as="button"
                    :href="`/users/${user?.id}/lists?status=pending`" class="btn-primary me-1">Pending List</Link>


                <Link :class="{ '!bg-green-400': $page.url === `/users/${user?.id}/lists` }" as="button"
                    :href="`/users/${user?.id}/lists`" class="btn-primary me-1">ALL</Link>
                <Link :class="{ '!bg-green-400': $page.url === `/users/${user?.id}/lists?status=approve` }" as="button"
                    :href="route('users.lists', { user: user?.id, search: params.search, status: 'approve' })"
                    class="btn-primary me-1">Approved List</Link>
                <Link :class="{ '!bg-green-400': params.status == 'pending' }" as="button"
                    :href="route('users.lists', { user: props.user.id, status: 'pending', search: params.search })"
                    class="btn-primary me-1">
                Pending
                List</Link>
            </div>
            <div class="flex justify-evenly items-center  gap-4">
                <Link v-if="search" class="badge " :href="route('users.lists', { user: user?.id, search: null, })">
                {{ search }}
                <i class="fa-solid fa-circle-xmark "></i>
                </Link>
                <SearchInput type="text" placeholder="search..." label="search" v-model="form.search" />
            </div>
        </div>



        <div v-if="Object.keys(listings.data).length">
            <div class="grid grid-cols-4 gap-6 px-2 mt-4 ">
                <template v-for="listing in listings.data" :key="listing">
                    <ListCard :listing="listing" />
                </template>
            </div>
            <div class="mx-2">
                <div class="flex justify-between items-center">
                    <button @click="back" class="px-2 py-1 rounded-lg text-sm bg-gray-300"> Back</button>
                    <div>
                        <Pagination :links="listings?.links" />
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <MyContainer class="text-2xl !text-red-500 text-center"> <i class="fa-solid fa-hourglass me-2"></i> Empty
                Listing
            </MyContainer>
            <button @click="back" class="px-2 py-1 rounded-lg text-sm bg-gray-300"> Back</button>
        </div>



    </MyContainer>


    <pre>
    <!-- {{ listings }} -->
    <!-- {{ params.status }} -->
</pre>
</template>

<script setup>
import { Link, router, useForm } from '@inertiajs/vue3';
import MyContainer from '../Components/MyContainer.vue';
import Title from '../Components/Title.vue';
import ListCard from './Components/ListCard.vue';
import Pagination from '../Components/Pagination.vue';
import FlashMessage from '../Components/FlashMessage.vue';
import SearchInput from '../Components/SearchInput.vue'
import { watch } from 'vue';


const props = defineProps({
    listings: Object,
    user: Object,
    flash: Object,
    message: String,
    search: String
});

const params = route().params

const back = () => {
    window.history.back();
}

const form = useForm({
    search: props.search
});

watch(form, (value) => {
    router.get(route('users.lists', { user: props.user.id, ...params, search: value.search }), {
        // preserveState: true
    })
})

</script>

<style lang="scss" scoped></style>
