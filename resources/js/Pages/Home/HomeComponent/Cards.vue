<template>
    <article
        class="rounded-lg border border-gray-100 bg-white p-4 shadow-sm transition hover:shadow-lg sm:p-6 w-[280px] h-[360px]">
        <span class="inline-block rounded bg-blue-600 p-2 text-white">
            <img :src="listing.image ? `/storage/${listing.image}` : `storage/images/listings/test.png`" alt="img"
                class="w-[40px] h-[40px] rounded-full">
            </span>
            <!-- <p class="text-sm text-red-400">{{ listing.user.name }}</p> -->

        <div class="flex flex-wrap gap-2 mt-2">
            <span class="badge" v-for="tag in listing.tags.split(',')" :key="tag">
            {{ tag }}
            </span>
        </div>

        <Link :href="route('listings.show',listing.id)">
            <h3 class="mt-0.5 text-lg font-medium text-gray-900">
                {{ listing.title }}
            </h3>
        </Link>

        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            {{ listing?.description.substring(0,100)+' ... ' }}
        </p>

        <Link :href="route('listings.show',listing?.id)" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
            Find out more

            <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                &rarr;
            </span>
        </Link>
    </article>

    <pre>
        <!-- {{ listing }} -->
    </pre>
</template>


<script setup>
defineProps({
    listing: {
        type: Object
    }
})
</script>
