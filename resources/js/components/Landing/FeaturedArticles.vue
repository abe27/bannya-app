<template>
  <div class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-12">บทความน่ารู้</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <div v-for="article in articles" :key="article.id" class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out">
          <img :src="article.imageUrl" :alt="article.title" class="w-full h-56 object-cover object-center">
          <div class="p-7">
            <h3 class="text-2xl font-semibold text-gray-900 mb-3">{{ article.title }}</h3>
            <p class="text-gray-700 leading-relaxed mb-5 text-lg">{{ article.excerpt }}</p>
            <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium transition duration-300 ease-in-out text-lg">
              อ่านต่อ
              <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="text-center mt-12">
        <a href="#" class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-full text-white bg-green-600 hover:bg-green-700 transition duration-300 ease-in-out shadow-lg">
          แสดงทั้งหมด
          <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const articles = ref([
  {
    id: 1,
    title: 'เรื่องน่ารู้เกี่ยวกับยาแก้แพ้',
    excerpt: 'ยาแก้แพ้มีหลายชนิด แต่ละชนิดมีวิธีใช้อย่างไร... ',
    imageUrl: '/images/landing/article1.jpg'
  },
  {
    id: 2,
    title: 'ดูแลตัวเองอย่างไรเมื่อเป็นภูมิแพ้',
    excerpt: 'เคล็ดลับการดูแลตัวเองง่ายๆ เมื่อต้องเผชิญกับอาการภูมิแพ้...',
    imageUrl: '/images/landing/article2.jpg'
  },
  {
    id: 3,
    title: 'สมุนไพรไทยช่วยบรรเทาอาการแพ้',
    excerpt: 'พบกับสมุนไพรไทยที่หาได้ง่ายและมีสรรพคุณช่วยบรรเทาอาการ...',
    imageUrl: '/images/landing/article3.jpg'
  }
]);
</script>
