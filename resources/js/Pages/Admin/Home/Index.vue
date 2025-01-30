<template>

    <Head title="Admin Dashboard" />

    <FlashMessage :message="message" :flash="flash" />

    <MyContainer>
        Admin {{ $page.props.auth.user.name }}
    </MyContainer>

    <!-- listing Section -->
    <MyContainer class=" overflow-hidden">
        <Table :listings="listings"  />
    </MyContainer>

    <!-- user section -->
    <div>
        <UserSection :users="users" />
    </div>

    <pre>
        <!-- {{ flash }} -->
          <!-- {{ canRoleChange }} -->
    </pre>

</template>



<script setup>
import MyContainer from '../../Components/MyContainer.vue'
import Table from './Components/Table.vue';
import FlashMessage from '../../Components/FlashMessage.vue'
import UserSection from './Sections/UserSection.vue';


const props = defineProps({
    listings: {
        type: Object
    },
    users: {
        type: Object
    },
    message: String,
    flash: Object,
    canRoleChange:Boolean
});
</script>

<style lang="scss" scoped></style>
