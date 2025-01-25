<template>
    <form action="{{ route('password.update') }}" method="post">
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
            <input type="password" name="current_password" id="current_password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
            <input type="password" name="password" id="password"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update
                Password</button>
        </div>
    </form>
</template>

<script setup>

</script>

<style lang="scss" scoped></style>
