<script setup lang="ts">
import GuestLayout from '@/layouts/GuestLayout.vue';

// No script needed for this component
</script>

<template>
  <GuestLayout>
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center py-12">
      <h1 class="text-5xl font-bold text-gray-800 mb-6">ติดต่อเรา</h1>
      <p class="text-xl text-gray-600 text-center max-w-2xl">
        หากมีข้อสงสัยหรือต้องการคำปรึกษา สามารถติดต่อเราได้ตามช่องทางด้านล่างนี้
      </p>
      <div class="mt-10 bg-white rounded-lg shadow-md p-8 max-w-md w-full">
        <div class="space-y-6">
          <div>
            <h3 class="text-xl font-semibold text-gray-800">ที่อยู่</h3>
            <p class="text-gray-600">70/112 หมู่บ้านเอื้ออาทร ต.ลาดขวาง อ.บ้านโพธิ์ จ.ฉะเชิงเทรา</p>
          </div>
          <div>
            <h3 class="text-xl font-semibold text-gray-800">โทรศัพท์</h3>
            <p class="text-gray-600">098-2496558, 038-088583</p>
          </div>
          <div>
            <h3 class="text-xl font-semibold text-gray-800">อีเมล</h3>
            <p class="text-gray-600">yourmail@gmail.com</p>
          </div>
          <div>
            <h3 class="text-xl font-semibold text-gray-800">เวลาทำการ</h3>
            <p class="text-gray-600">จันทร์ - ศุกร์: 9:00 - 18:00 น.</p>
            <p class="text-gray-600">เสาร์ - อาทิตย์: 10:00 - 16:00 น.</p>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
