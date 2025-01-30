<template>
    <MyContainer>
        <Title class="px-5">User Section</Title>
        <div v-if="Object.keys(users?.data).length">
            <UserTable :users="users?.data" />
        </div>
        <div v-else>
            <MyContainer>Nothing User</MyContainer>
        </div>
        <MyContainer class="text-end text-xs border !border-green-200">
            <Pagination :links="users?.links"  />
        </MyContainer>
    </MyContainer>
</template>

<script setup>
import MyContainer from '../../../Components/MyContainer.vue';
import Title from '../../../Components/Title.vue';
import UserTable from '../Components/UserTable.vue';
import Pagination from '../../../Components/Pagination.vue';


defineProps({
    users: Object,
});
</script>

<style lang="scss" scoped></style>
