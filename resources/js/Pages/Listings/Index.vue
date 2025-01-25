<template>

    <Head title="Listing " />
    <div>
        <MyContainer>
            <div class="grid gap-4">
                <h2 class="text-center text-2xl font-bold tracking-tight text-white dark:text-gray-600 sm:text-4xl">
                   Listing
                </h2>

                <div>
                    <SearchInput label="search" placeholder="search" type="text" :action="submit" v-model="form.search"/>
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
import { useForm } from "@inertiajs/vue3";
import { throttle } from 'lodash';
import { watch } from "vue";



const props = defineProps({
    listings: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    search:'',
});

watch(form,throttle(({search})=>{
    form.get(route('listings.index'),{
        preserveState:true,
        preserveScroll:true,
        // onSuccess:()=>
    })
},1000));

const submit = ()=>{
    form.get(route('listings.index',{
        preserveState:true,
    }))
}



</script>

<style lang="scss" scoped></style>
