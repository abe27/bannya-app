<template>
  <div class="bg-gray-50">
    <Navbar />
    <HeroSection :hero-data="heroSection" />
    <PromotionsSection :promotions-data="promotionsSection" />
    <BestSellersSection :best-sellers-data="bestSellersSection" />
    <FeaturedArticles :articles-data="featuredArticlesSection" />
    <CallToAction :call-to-action-data="callToActionSection" />
    <Footer />

    <!-- Contact Us Button -->
    <div class="fixed bottom-4 right-4 z-50 flex flex-col items-end">
      <button @click="toggleContact" class="bg-green-600 text-white p-4 rounded-full shadow-xl hover:bg-green-700 transition-all duration-300 ease-in-out transform hover:scale-105 flex items-center justify-center space-x-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
        <svg v-if="!showContactOptions" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path></svg>
        <span v-if="!showContactOptions" class="text-lg font-semibold">ติดต่อเรา</span>
        <svg v-else class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>

      <div v-if="showContactOptions" class="mt-3 bg-white p-5 rounded-xl shadow-2xl space-y-3 w-64 transform origin-bottom-right animate-fade-in-up">
        <a href="tel:0982496558" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 transition duration-200 ease-in-out p-2 rounded-lg hover:bg-gray-100">
          <img src="/images/067-phone.svg" alt="Phone Icon" class="w-6 h-6">
          <span class="text-lg font-medium">โทร: 098-2496558</span>
        </a>
        <a href="https://line.me/ti/p/@yourlineid" target="_blank" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 transition duration-200 ease-in-out p-2 rounded-lg hover:bg-gray-100">
          <img src="/images/line-1.svg" alt="Line Icon" class="w-6 h-6">
          <span>Line: @yourlineid</span>
        </a>
        <a href="#" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 transition duration-200 ease-in-out p-2 rounded-lg hover:bg-gray-100">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
          <span class="text-lg font-medium">Chat (เร็วๆ นี้)</span>
        </a>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import Navbar from '@/components/Landing/Navbar.vue';
import HeroSection from '@/components/Landing/HeroSection.vue';
import PromotionsSection from '@/components/Landing/PromotionsSection.vue';
import BestSellersSection from '@/components/Landing/BestSellersSection.vue';
import FeaturedArticles from '@/components/Landing/FeaturedArticles.vue';
import CallToAction from '@/components/Landing/CallToAction.vue';
import Footer from '@/components/Landing/Footer.vue';

interface HomeProps {
  heroSection: { titlePart1: string; titlePart2: string; description: string; button1Text: string; button2Text: string; image: string };
  promotionsSection: { title: string; description: string; viewMoreText: string; items: Array<{ id: number; title: string; description: string; image: string }> };
  bestSellersSection: { title: string; description: string; categoryPrefix: string; items: Array<{ id: number; name: string; category: string; price: string; image: string }> };
  featuredArticlesSection: { title: string; description: string; authorPrefix: string; items: Array<{ id: number; title: string; date: string; author: string; image: string }> };
  callToActionSection: { title: string; description: string; button1Text: string; button2Text: string; image: string };
}

const { heroSection, promotionsSection, bestSellersSection, featuredArticlesSection, callToActionSection } = defineProps<HomeProps>();

// Contact Us logic
const showContactOptions = ref(false);

const toggleContact = () => {
  showContactOptions.value = !showContactOptions.value;
};

// Close contact options if clicked outside
const handleClickOutside = (event: MouseEvent) => {
  const contactButtonContainer = document.querySelector('.fixed.bottom-4.right-4');
  if (contactButtonContainer && !contactButtonContainer.contains(event.target as Node)) {
    showContactOptions.value = false;
  }
};

onMounted(() => {
  document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside);
});
</script>
