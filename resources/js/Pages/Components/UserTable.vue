<template>
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
                        {{ new Date(user.created_at).toLocaleDateString('yangon') }}
                    </td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <Link :href="route(routeName, user.id)" class="text-blue-500 hover:text-blue-700">View
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
defineProps({
    users: {
        type: Object,
        required: true,
    },
    routeName: {
        type: String,
        required: true,
    }
});
</script>

<style lang="scss" scoped></style>
