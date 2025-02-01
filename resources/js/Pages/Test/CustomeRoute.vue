<script setup>
import { router, useForm, usePage } from '@inertiajs/vue3';
import { useRoute } from '../../../../vendor/tightenco/ziggy/src/js';


const route = useRoute();
const page = usePage();
const params = route().params

const form = useForm({
    name: 'test'
});

const inertiaRouter = () => {
    router.get(route('admins.index'), {}, {
        onFinish: () => alert('success'),
        // preserveScroll: true
    })
}

const submit = () => {
    form.get(route('test.get',{
        params: form.name
    }), {
        // preserveState: true,
        onError: () => form.reset(),
    })
}

</script>


<template>
    <div>
        <button @click="route">{{ route }} </button> <br>
        <Link class="btn-primary" :href="route('admins.index')">Admin {{ }}</Link>
        <br>

        <button class="btn-primary">{{ page }}</button> <br>
        <button class="btn-primary">{{ params }}</button> <br>

        <button @click="inertiaRouter">Inertia Router</button><br><br>

        <form @submit.prevent="submit">
            <input type="text" v-model="form.name">
            <input type="submit" value="submit">
        </form>

    </div>
</template>
