<template>

    <MyContainer>
        <div class="overflow-x-auto rounded-lg border border-gray-200 ">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm ">

                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-2/6 ">Name & Email</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-1/6 ">Role</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-1/6 ">Listings</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-2/6 ">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <tr v-for="user in users" :key="user.id" class="">
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-2/6">
                            <div class="flex justify-between space-x-8 items-center">
                                <span class="text-gray-500">{{ user?.name }}</span>
                                <span class="text-xs text-red-400">{{ user?.email }}</span>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 w-1/6 text-center">
                            <!-- roles section -->
                            <div v-show="$page.props.auth.user.role ==='admin' || $page.props.isAdmin">
                                <RoleSelect :user="user" />
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 w-1/6 text-center ">
                            <div v-if="user.listings?.length" class="px-2 py-1 ms-4">
                                <div class="flex items-center gap-6 ps-6">
                                    <div class="flex items-center gap-2">
                                        <p> {{ user.listings.filter(l => l.approved).length }}</p>
                                        <i class="fa-solid fa-circle-check text-green-500"></i>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <p> {{ user.listings.filter(l => !l.approved).length }}</p>
                                        <i class="fa-solid fa-circle-xmark text-red-500"></i>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="ms-4">
                                <p class="badge inline text-blue-600">empty list</p>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 w-2/6 text-center">
                            <Link class="text-blue-400 p-2 ms-2" :href="route('users.show', user.id)"><i
                                class="fa-solid fa-eye"></i></Link>
                            <Link class="text-yellow-400 p-2 ms-2" :href="route('users.lists', user.id)"><i
                                class="fa-solid fa-pen"></i></Link>
                            <Link class="text-red-400 p-2 ms-2" :href="route('users.show', user.id)"><i
                                class="fa-solid fa-trash"></i></Link>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </MyContainer>
</template>

<script setup>
import MyContainer from '../../../Components/MyContainer.vue';
import RoleSelect from './RoleSelect.vue';

defineProps({
    users: Array
});


</script>

<style lang="scss" scoped></style>
