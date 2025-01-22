<template>

    <Head title="Users" />
    <div class="overflow-x-auto rounded-lg border border-gray-200 mt-5">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Email</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Create_at</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ user.name }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ user.email }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            {{ new Date(user.created_at).toLocaleDateString('en-GB') }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            <Link :href="route('users.show', user.id)" class="text-blue-500 hover:text-blue-700">View
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <MyContainer>
            <div class="pagination text-end">
                <Link v-for="link in users.links" :key="link.label" :href="link.url" v-html="link.label "
                class="px-2 py-1 rounded-lg bg-gray-400 mx-1"
                :class="{'bg-red-400':link.active}"/>
            </div>
        </MyContainer>
</template>

<script setup>
import MyContainer from "../Components/MyContainer.vue";
const props = defineProps({
    users: {
        type: Object,
        required: true,

    }
});
</script>
