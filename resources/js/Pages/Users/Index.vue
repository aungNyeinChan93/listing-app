<template>
    <Head title="Users" />
    <MyContainer>
    <UserTable :users="users" routeName="users.show" />
        <div class="pagination text-end mt-3">
            <Pagination :links="users.links" />
        </div>
    </MyContainer>
</template>

<script setup>
import MyContainer from "../Components/MyContainer.vue";
import UserTable from "../Components/UserTable.vue";
import Pagination from "../Components/Pagination.vue";

const props = defineProps({
    users: {
        type: Object,
        required: true,

    }
});
</script>
