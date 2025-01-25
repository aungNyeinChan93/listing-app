<template>
    <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
        <dl class="-my-3 divide-y divide-gray-100 text-sm">


            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Name</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.user.name }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Email</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.user.email }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Title</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.title }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Tags</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ listing.tags }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Description</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ listing.description }}
                </dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Listed</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    {{ new Date(listing.created_at).toLocaleDateString('en-GB') }}
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
