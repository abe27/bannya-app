<template>
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center">
        <img src="/images/logo.png" alt="BannyaApp Logo" class="h-12 w-auto">
        <a href="/" class="text-2xl font-bold text-gray-800 ml-3">บ้านยา</a>
      </div>
      <div class="hidden md:flex items-center space-x-8">
        <a href="#" class="text-lg text-gray-700 hover:text-green-600 transition duration-300 ease-in-out">หน้าแรก</a>
        <a href="#" class="text-lg text-gray-700 hover:text-green-600 transition duration-300 ease-in-out">เกี่ยวกับเรา</a>
        <a href="#" class="text-lg text-gray-700 hover:text-green-600 transition duration-300 ease-in-out">บทความน่ารู้</a>
      </div>
      <div class="hidden md:flex items-center space-x-4">
        <a href="/login" class="text-lg text-gray-700 hover:text-green-600 transition duration-300 ease-in-out">เข้าสู่ระบบ</a>
        <a href="/register" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700 transition duration-300 ease-in-out shadow-lg text-lg">ลงทะเบียน</a>
      </div>
      <div class="md:hidden">
        <button @click="isOpen = !isOpen" class="text-gray-600 focus:outline-none">
          <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>
    </div>
    <div v-if="isOpen" class="md:hidden bg-white shadow-lg">
      <a href="#" class="block px-4 py-3 text-lg text-gray-700 hover:bg-green-50">หน้าแรก</a>
      <a href="#" class="block px-4 py-3 text-lg text-gray-700 hover:bg-green-50">เกี่ยวกับเรา</a>
      <a href="#" class="block px-4 py-3 text-lg text-gray-700 hover:bg-green-50">บทความน่ารู้</a>
      <a href="/login" class="block px-4 py-3 text-lg text-gray-700 hover:bg-green-50">เข้าสู่ระบบ</a>
      <a href="/register" class="block px-4 py-3 text-lg text-gray-700 hover:bg-green-50">ลงทะเบียน</a>
    </div>
  </nav>
</template>

<script setup>
import { ref } from 'vue';

const isOpen = ref(false);
</script>
