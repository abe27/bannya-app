<template>
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ bestSellersData.title }}</h2>
        <p class="mt-2 text-lg leading-8 text-gray-600">
          {{ bestSellersData.description }}
        </p>
      </div>
      <div
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4 xl:gap-x-8">
        <div v-for="bestSeller in bestSellersData.items" :key="bestSeller.id" class="group relative">
          <div
            class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img :src="bestSeller.image" :alt="bestSeller.name"
              class="h-full w-full object-cover object-center lg:h-full lg:w-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="#">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  {{ bestSeller.name }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">{{ bestSellersData.categoryPrefix }} {{ bestSeller.category }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">{{ bestSeller.price }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
interface BestSellerItem {
  id: number;
  name: string;
  category: string;
  price: string;
  image: string;
}

interface BestSellersData {
  title: string;
  description: string;
  categoryPrefix: string;
  items: BestSellerItem[];
}

defineProps<{ bestSellersData: BestSellersData }>();
</script>
