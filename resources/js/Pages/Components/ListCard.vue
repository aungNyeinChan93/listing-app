<template>
    <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
        <dl class="-my-3 divide-y divide-gray-100 text-sm">

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Name</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.user.name }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Email</dt>
                <dd class="text-gray-700 sm:col-span-2 ">{{ listing.user.email }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Role</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.user.role.toUpperCase()  }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Title</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.title }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Description</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ listing.description }}
                </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Tags</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    <ul class="flex flex-wrap gap-2">
                        <li v-for="(tag, i) in listing.tags.split(',')" :key="i" class="badge bg-red-200 hover:bg-red-300 text-gray-600">
                            {{ tag }}
                        </li>
                    </ul>
                </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Link</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    <template v-if="listing.link">
                        <a target="_blank" :href="listing.link">{{ listing.link || nil }}</a>
                    </template>
                    <template v-else>
                        <span>nil</span>
                    </template>
                </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Listed</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ new Date(listing.created_at).toLocaleDateString('yangon') }}
                </dd>
            </div>
        </dl>
    </div>

</template>

<script setup>

defineProps({
    listing: {
        type: Object,
        required: true,
    },
    // routeName: {
    //     type: String,
    //     required: true,
    // },
});

</script>

<style scoped>
dd {
    color: rgb(100, 98, 231);
    font-size: 1rem;
}
</style>
