<template>
  <div>
    <Navbar />
    <main class="pt-20">
      <!-- Page content will be rendered here -->
      <slot />
    </main>
    <Footer />
  </div>
</template>

<script setup lang="ts">
import Navbar from '@/Components/Landing/Navbar.vue';
import Footer from '@/Components/Landing/Footer.vue';
</script>