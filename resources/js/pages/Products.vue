<script setup lang="ts">
import GuestLayout from '@/layouts/GuestLayout.vue';

// Logic for fetching products will be added here later
</script>

<template>
  <GuestLayout>
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center py-12">
      <h1 class="text-5xl font-bold text-gray-800 mb-6">สินค้าของเรา</h1>
      <p class="text-xl text-gray-600 text-center max-w-2xl">
        ค้นพบยา เวชภัณฑ์ และผลิตภัณฑ์เพื่อสุขภาพคุณภาพสูงจากบ้านยา เราคัดสรรสิ่งที่ดีที่สุดเพื่อคุณ
      </p>
      <!-- Product listing will go here -->
      <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <div v-for="i in 3" :key="i" class="bg-white rounded-lg shadow-md p-6 text-center">
          <img :src="`https://placehold.co/300x200/a7f3d0/4d7c0f?text=Product+${i}`" alt="Product Image"
            class="mx-auto mb-4 rounded-md">
          <h3 class="text-xl font-semibold text-gray-800">ชื่อสินค้า {{ i }}</h3>
          <p class="text-gray-600 mt-2">รายละเอียดสินค้าโดยย่อ</p>
          <p class="text-green-600 font-bold text-lg mt-3">฿XXX</p>
          <button
            class="mt-4 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">ดูรายละเอียด</button>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
