<template>
    <h1 class="text-2xl font-bold pb-4 px-1 underline underline-offset-8 uppercase">
        Listing Lists
    </h1>
    <div class="overflow-x-auto rounded-lg border border-green-200">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm overflow-hidden">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        User Name
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        Title
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        Tags
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        Status
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        Date
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr v-for="listing in listings.data" :key="listing" class="bg-green-100/30 " :class="{'!bg-red-100/30': listing?.user.role === 'suspended',}">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-xs">
                        {{ listing.user.name.toUpperCase() }}
                    </td>

                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        {{ listing.title }}
                    </td>

                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <span v-for="tag in listing?.tags.split(',')" :key="tag.id" class="badge ms-1 text-xs">{{ tag
                            }}</span>
                    </td>

                    <td v-if="listing?.approved" class="text-center whitespace-nowrap px-4 py-2 text-gray-700">
                        <i class="fa-solid fa-circle-check text-green-400"></i>
                    </td>
                    <td v-else class="text-center whitespace-nowrap px-4 py-2 text-gray-700">
                        <i class="fa-solid fa-circle-xmark text-red-400"></i>
                    </td>

                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        {{ new Date(listing.created_at).toLocaleDateString('yangon') }} |
                        {{ new Date(listing.created_at).toLocaleTimeString('yangon', { hour: '2-digit', minute: '2-digit' }) }}
                    </td>

                    <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                        <Link :href="route('listings.show', listing.id)" class="btn-primary text-xs"><i
                            class="fa-solid fa-eye"></i></Link>
                        <Link as="button" method="PUT" :href="route('listings.approved', listing.id)" class="btn-primary !bg-green-500 text-xs"><i
                            class="fa-solid fa-check"></i></Link>
                        <Link  as="button" method="PUT" :href="route('listings.reject', listing.id)" class="btn-primary !bg-red-500 text-xs"><i
                            class="fa-solid fa-ban"></i></Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <MyContainer class="mt-4 text-end text-xs border !border-green-200">
        <Pagination :links="listings.links" />
    </MyContainer>


    <pre>
        <!-- {{ message }} -->
    </pre>
</template>

<script setup>
import MyContainer from "../../../Components/MyContainer.vue";
import Pagination from "../../../Components/Pagination.vue";

const emit = defineEmits(['message'])

const props = defineProps({
    listings: {
        type: Object,
    },

});



</script>

<style lang="scss" scoped></style>
