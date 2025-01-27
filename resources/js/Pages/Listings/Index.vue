<template>

    <Head title="Listing " />
    <div>
        <MyContainer>
            <div class="grid gap-4">
                <div v-if="flash">
                    <FlashMEssage :message="flash.message" :flash="flash"/>
                </div>

                <h2 class="text-center text-2xl font-bold tracking-tight text-white dark:text-gray-600 sm:text-4xl">
                    Listing <span class="text-red-600 text-lg">( {{ listings.total || Object.keys(listings.data).length }} )</span>
                </h2>


                <div class="flex justify-between items-center px-1">
                    <div class="space-x-2">
                        <Link v-if="params.tag" class="badge" :href="route('listings.index', { ...params, tag: null })">
                        {{
                            params.tag }} <i class="fa-solid fa-xmark ms-1 text-sm"></i></Link>

                        <Link v-if="params.search" class="badge"
                            :href="route('listings.index', { ...params, search: null })"> {{
                                params.search }} <i class="fa-solid fa-xmark ms-1 text-sm"></i></Link>

                        <Link v-if="params.user_id" class="badge"
                            :href="route('listings.index', { ...params, user_id: null })"> {{
                                userName }} <i class="fa-solid fa-xmark ms-1 text-sm"></i></Link>
                    </div>

                    <div class="flex space-x-3 justify-end">
                        <Link :href="route('listings.create')" class="flex items-center">
                            <i class="fa-solid fa-plus border border-blue-600 p-2 rounded-full "></i>
                        </Link>
                        <Link as="button" :href="route('listings.non-approved')" class="btn-primary">Pending</Link>
                        <SearchInput label="search" placeholder="search" type="text" :action="submit"
                            v-model="form.search" />
                    </div>
                </div>


                <div v-if="Object.keys(listings.data).length">
                    <ListsCard :listings="listings" routeName="listings.show" />
                    <div class="text-end mt-4">
                        <Pagination :links="listings.links" />
                    </div>
                </div>
                <div v-else>
                    <MyContainer>
                        <p class="text-lg font-bold text-center text-red-500">Empty List <i
                                class="fa-solid fa-list"></i></p>
                    </MyContainer>
                </div>
            </div>
        </MyContainer>
    </div>

</template>

<script setup>

import MyContainer from "../Components/MyContainer.vue";
import ListsCard from "../Components/ListsCard.vue";
import Pagination from "../Components/Pagination.vue";
import SearchInput from '../Components/SearchInput.vue'
import { router, useForm } from "@inertiajs/vue3";
import { throttle } from 'lodash';
import { watch } from "vue";
import FlashMEssage from '../Components/FlashMessage.vue'

const props = defineProps({
    listings: {
        type: Object,
        required: true,
    },
    search: String,
    flash:Object,
});

const params = route().params;

const form = useForm({
    search: props.search,
});

watch(form, throttle(({ search }) => {
    router.get(route('listings.index'), { search: search, user_id: params.user_id, tag: params.tag }, {
        // preserveState:true
    })
}, 200));

const submit = () => {
    form.get(route('listings.index', {
        preserveState: true,
    }))
}

const userName = params.user_id ? props.listings.data.find(list => list.user_id === Number(params.user_id)).user.name : null;

</script>

<style lang="scss" scoped></style>
