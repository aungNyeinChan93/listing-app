<template>
    <Head title="Admin Dashboard"/>

    <FlashMessage :message="message" :flash="flash"/>

    <MyContainer>
        Admin {{ $page.props.auth.user.name }}
    </MyContainer>

    <MyContainer class=" overflow-hidden">
        <Table :listings="listings"/>
    </MyContainer>

    <pre>
        <!-- {{ listings }} -->
        <!-- {{ message }} -->
          <!-- {{ flash }} -->
    </pre>
</template>



<script setup>
import MyContainer from '../../Components/MyContainer.vue'
import Table from './Components/Table.vue';
import FlashMessage from '../../Components/FlashMessage.vue'


const props = defineProps({
    listings:{
        type:Object
    },
    message:String,
    flash:Object,
});
</script>

<style lang="scss" scoped>

</style>
