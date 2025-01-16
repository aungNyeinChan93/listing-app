<template>
    <div class="mt-5">

        <Link :class="{ 'bg-blue-700': $page.component == 'Home/Index' }" :href="route('home')"
            class="px-4 py-2 rounded bg-blue-400 ">
        Home
        </Link>

        <div class="grid grid-cols-12 gap-4  p-2">
            <div v-if="$page.props.flash.message" class=" col-span-12 p-2 bg-green-400 text-xl ">{{ $page.props.flash.message }}
                <button @click="$page.props.flash.message = ''" class="px-2 float-end">X</button>
            </div>
        </div>

    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';


const page = usePage();
// console.log(page.props);

</script>

<style lang="scss" scoped></style>
