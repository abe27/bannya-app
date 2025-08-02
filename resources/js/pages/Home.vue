<template>
  <div class="bg-gray-50">
    <Navbar />
    <HeroSection />
    <FeaturedArticles />
    <CallToAction />
    <Footer />
  </div>
</template>

<script setup>
import Navbar from '@/Components/Landing/Navbar.vue';
import HeroSection from '@/Components/Landing/HeroSection.vue';
import FeaturedArticles from '@/Components/Landing/FeaturedArticles.vue';
import CallToAction from '@/Components/Landing/CallToAction.vue';
import Footer from '@/Components/Landing/Footer.vue';
</script>
