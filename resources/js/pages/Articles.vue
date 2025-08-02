<script setup lang="ts">
import GuestLayout from '@/layouts/GuestLayout.vue';

// Logic for fetching articles will be added here later
</script>

<template>
    <GuestLayout>
        <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center py-12">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">บทความสุขภาพ</h1>
            <p class="text-xl text-gray-600 text-center max-w-2xl">
                อัปเดตความรู้ด้านสุขภาพ เทคนิคการดูแลตัวเอง และข่าวสารทางการแพทย์จากผู้เชี่ยวชาญของเรา
            </p>
            <!-- Article listing will go here -->
            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="i in 3" :key="i" class="bg-white rounded-lg shadow-md p-6">
                    <img :src="`https://placehold.co/300x200/a7f3d0/4d7c0f?text=Article+${i}`" alt="Article Image"
                        class="w-full h-40 object-cover mb-4 rounded-md">
                    <h3 class="text-xl font-semibold text-gray-800">หัวข้อบทความ {{ i }}</h3>
                    <p class="text-gray-600 mt-2 line-clamp-3">เนื้อหาบทความโดยย่อเกี่ยวกับสุขภาพและการดูแลตัวเอง...</p>
                    <button class="mt-4 text-green-600 hover:text-green-800 font-semibold">อ่านต่อ →</button>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
