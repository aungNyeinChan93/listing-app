<template>
    <MyContainer>
        <div class="overflow-x-auto rounded-lg border border-gray-200 relative ">



            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm ">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-3/6 ">Name</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-1/6 ">Role</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-1/6 ">Listings</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-1/6 ">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    <tr v-for="user in users" :key="user.id" class="">

                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 w-3/6">
                            <div class="flex justify-start space-x-8 items-center">
                                <span class="text-blue-500">{{ user?.name }}</span>
                                <span>{{ user?.email }}</span>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 w-1/6 ">
                            <span @click="showStatus = !showStatus" class="badge  bg-green-300/80"
                                :class="{ ' !bg-red-300/80': user.role === 'suspended' }"> {{
                                    user?.role }}
                                <i class="fa-solid fa-sort-down ms-1"></i>
                            </span>
                            <!-- drop down -->
                            <div v-if="showStatus" class=" absolute top-2 end-2">
                                <ul class="p-3 w-[120px] px-2  bg-gray-200 rounded-lg">
                                    <div class="bg-green-300 p-1 rounded-lg mt-1 text-center hover:bg-green-200">
                                        <Link :href="route('users.changeRole', user.id)" as="button" method="POST">
                                        suspended</Link>
                                    </div>

                                    <div class="bg-green-300 p-1 rounded-lg mt-1 text-center hover:bg-green-200">
                                        <Link>general</Link>
                                    </div>

                                    <div class="bg-green-300 p-1 rounded-lg mt-1 text-center hover:bg-green-200">
                                        <Link>admin</Link>
                                    </div>
                                </ul>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 w-1/6 ">
                            <div v-if="user.listings?.length" class="px-2 py-1 ms-4 ">
                                <div class="flex items-center gap-6">
                                    <div class="flex items-center gap-2" >
                                        <p > {{ user.listings.filter(l=>l.approved).length }}</p>
                                        <i class="fa-solid fa-circle-check text-green-500"></i>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <p> {{ user.listings.filter(l=>!l.approved).length }}</p>
                                        <i class="fa-solid fa-circle-xmark text-red-500"></i>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="ms-4">
                                <p class="badge inline text-blue-600">empty list</p>
                            </div>
                        </td>

                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 w-2/6">
                            <Link class="text-blue-400 p-2 ms-2" :href="route('users.show', user.id)"><i
                                class="fa-solid fa-eye"></i></Link>
                            <Link class="text-yellow-400 p-2 ms-2" :href="route('users.show', user.id)"><i
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
import { ref } from 'vue';
import MyContainer from '../../../Components/MyContainer.vue';


defineProps({
    users: Array
});

const showStatus = ref(false)


</script>

<style lang="scss" scoped></style>
