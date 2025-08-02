<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-green-100 to-green-200 p-6 md:p-10">
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 md:p-10 overflow-hidden">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center gap-4">
                    <Link :href="route('home')" class="flex flex-col items-center gap-2 font-medium">
                        <h1 class="text-4xl font-extrabold text-gray-900 mt-4">{{ title }}</h1>
                        <p class="text-center text-lg text-gray-600">{{ description }}</p>
                    </Link>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>
