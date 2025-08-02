<template>
  <GuestLayout>
    <HeroSection :hero-data="heroSection" />
    <PromotionsSection :promotions-data="promotionsSection" />
    <BestSellersSection :best-sellers-data="bestSellersSection" />
    <FeaturedArticles :articles-data="featuredArticlesSection" />
    <CallToAction :call-to-action-data="callToActionSection" />
  </GuestLayout>
</template>

<script setup lang="ts">
import GuestLayout from '@/layouts/GuestLayout.vue';
import HeroSection from '@/components/Landing/HeroSection.vue';
import PromotionsSection from '@/components/Landing/PromotionsSection.vue';
import BestSellersSection from '@/components/Landing/BestSellersSection.vue';
import FeaturedArticles from '@/components/Landing/FeaturedArticles.vue';
import CallToAction from '@/components/Landing/CallToAction.vue';

interface HomeProps {
  heroSection: { titlePart1: string; titlePart2: string; description: string; button1Text: string; button2Text: string; image: string };
  promotionsSection: { title: string; description: string; viewMoreText: string; items: Array<{ id: number; title: string; description: string; image: string }> };
  bestSellersSection: { title: string; description: string; categoryPrefix: string; items: Array<{ id: number; name: string; category: string; price: string; image: string }> };
  featuredArticlesSection: { title: string; description: string; authorPrefix: string; items: Array<{ id: number; title: string; date: string; author: string; image: string }> };
  callToActionSection: { title: string; description: string; button1Text: string; button2Text: string; image: string };
}

const { heroSection, promotionsSection, bestSellersSection, featuredArticlesSection, callToActionSection } = defineProps<HomeProps>();
</script>
