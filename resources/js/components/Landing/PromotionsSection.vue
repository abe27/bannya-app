<template>
  <div class="bg-gray-50 py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ promotionsData.title }}</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">
          {{ promotionsData.description }}
        </p>
      </div>
      <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <article v-for="promotion in promotionsData.items" :key="promotion.id"
          class="flex max-w-xl flex-col items-start justify-between overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
          <div class="w-full">
            <img :src="promotion.image" :alt="promotion.title" class="w-full h-48 object-cover">
          </div>
          <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-lg font-semibold leading-6 text-gray-900">
              <a href="#">
                <span class="absolute inset-0"></span>
                {{ promotion.title }}
              </a>
            </h3>
            <p class="mt-3 line-clamp-3 text-sm leading-6 text-gray-600 flex-grow">
              {{ promotion.description }}
            </p>
            <div class="mt-4">
              <a href="#" class="text-green-600 hover:text-green-800 font-semibold">{{ promotionsData.viewMoreText }}</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
interface PromotionItem {
  id: number;
  title: string;
  description: string;
  image: string;
}

interface PromotionsData {
  title: string;
  description: string;
  viewMoreText: string;
  items: PromotionItem[];
}

const props = defineProps<{ promotionsData: PromotionsData }>();
</script>