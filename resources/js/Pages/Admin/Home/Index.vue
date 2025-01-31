<template>

    <Head title="Admin Dashboard" />

    <FlashMessage :message="message" :flash="flash" />

    <MyContainer>
        <div class="flex justify-between items-center px-2">
            <div>
                <span class=" capitalize mx-2">{{ $page.props.auth.user.role }} </span>
                <span class="text-red-500 capitalize">{{ $page.props.auth.user.name }}</span>
            </div>

            <!-- show-hide section -->
            <div>
                <button @click="listShow = !listShow" class="ms-4 px-2 py-1 bg-green-400 rounded-lg text-white"
                    :class="{ '!bg-red-400': !listShow }">
                    <div v-if="listShow">
                        <span>Listing</span>
                        <i class=" ms-2 fa-solid fa-eye"></i>
                    </div>
                    <div v-else>
                        <span>Listing</span>
                        <i class="ms-2 fa-solid fa-eye-slash"></i>
                    </div>
                </button>
                <button @click="userShow = !userShow" class="ms-4 px-2 py-1 bg-green-400 rounded-lg text-white"
                    :class="{ '!bg-red-400': !userShow }">
                    <div v-if="userShow">
                        <span>User</span>
                        <i class=" ms-2 fa-solid fa-eye"></i>
                    </div>
                    <div v-else>
                        <span>User</span>
                        <i class="ms-2 fa-solid fa-eye-slash"></i>
                    </div>
                </button>
            </div>
        </div>
    </MyContainer>

    <!-- listing Section -->
    <div v-show="listShow">
        <MyContainer class=" overflow-hidden">
            <Table :listings="listings" :search="search" />
        </MyContainer>
    </div>

    <!-- user section -->
    <div v-show="userShow">
        <UserSection :users="users" />
    </div>

</template>



<script setup>
import MyContainer from '../../Components/MyContainer.vue'
import Table from './Components/Table.vue';
import FlashMessage from '../../Components/FlashMessage.vue'
import UserSection from './Sections/UserSection.vue';
import { ref } from 'vue';


const props = defineProps({
    listings: {
        type: Object
    },
    users: {
        type: Object
    },
    message: String,
    flash: Object,
    canRoleChange: Boolean,
    search: String
});

const listShow = ref(false)
const userShow = ref(false)

</script>

<style lang="scss" scoped></style>
