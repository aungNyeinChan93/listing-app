<template>
    <article class="group w-[280px] h-[400px]">
        <Link :href="route('listings.show', listing.id)">
        <img alt="image"
            :src="listing?.image ? `http://localhost:8000/storage/${listing?.image}` : 'https://images.unsplash.com/photo-1631451095765-2c91616fc9e6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80'"
            class="h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%]" />
        </Link>

        <div class="p-4">
            <Link :href="route('listings.show', listing?.id)">
            <h3 class="text-lg font-medium text-gray-900">{{ listing?.title }}</h3>
            </Link>

            <div class="flex mt-2">
                <p @click.prevent="approved(listing?.id, listing)" class="badge inline bg-green-400/80 text-xs"
                    :class="{ '!bg-red-400/80': !listing?.approved }">
                    {{ listing?.approved ? 'Approved' : 'Pending' }}
                </p>
            </div>
            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                {{ listing?.description.substring(0, 40) + ' . . . ' }}
            </p>
        </div>
    </article>
    <pre>

    </pre>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';

defineProps({
    listing: Object,

})

const approved = (id, listing) => {
    if (!listing.approved) {
        router.put(route('listings.approved', id), {}, {
            onBefore: () => confirm('Are You sure want to approved this List?'),
        })
    } else {
        router.put(route('listings.reject', id), {}, {
            onBefore: () => confirm('Are You sure want to reject this List?'),
        })
    }
}

</script>
