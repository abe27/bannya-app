<template>
  <footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Section 1: Business Info -->
          <div class="space-y-4">
            <h3 class="text-2xl font-bold text-white">ร้านขายยา บ้านยาเอื้ออาทร</h3>
            <p class="text-base text-gray-400">ใบอนุญาตขายยาแผนปัจจุบันเลขที่ xxxxxxx</p>
            <p class="text-base text-gray-400">
              บริษัท ออลเนอร์จี เมดิคอล อิควิปเมนท์ จำกัด <br />
              ALLNERGY MEDICAL EQUIPMENT CO., LTD.
            </p>
            <div class="flex items-start space-x-2">
              <img class="h-6 w-6 text-green-400" src="/images/fi-ss-marker.svg" alt="Location Icon">
              <p class="text-base text-gray-400">
                ที่อยู่ เลขที่ 70/112 หมู่บ้านเอื้ออาทร <br />
                ตำบลลาดขวาง อำเภอบ้านโพธิ์ จังหวัดฉะเชิงเทรา
              </p>
            </div>
          </div>

          <!-- Section 2: Contact Info -->
          <div class="space-y-4">
            <h3 class="text-2xl font-bold text-white">ติดต่อสอบถาม และสั่งซื้อสินค้า</h3>
            <div class="flex items-center space-x-2">
              <img class="h-6 w-6 text-green-400" src="/images/067-phone.svg" alt="Phone Icon">
              <span class="text-gray-400 text-base">098-2496558, 038-088583</span>
            </div>
            <div class="flex items-center space-x-2">
              <img class="h-6 w-6 text-green-400" src="/images/email.svg" alt="Email Icon">
              <span class="text-gray-400 text-base">yourmail@gmail.com</span>
            </div>
            <div class="flex space-x-4 pt-2">
              <a href="#" class="text-gray-400 hover:text-white"><img src="/images/facebook-1.svg" class="h-8 w-8"
                  alt="Facebook"></a>
              <a href="#" class="text-gray-400 hover:text-white"><img src="/images/instagram-1.svg" class="h-8 w-8"
                  alt="Instagram"></a>
              <a href="#" class="text-gray-400 hover:text-white"><img src="/images/line-1.svg" class="h-8 w-8"
                  alt="Line"></a>
            </div>
          </div>

          <!-- QR Code -->
          <div class="flex flex-col items-center justify-center">
            <div class="w-40 h-40 bg-white flex items-center justify-center rounded-lg shadow-lg">
              <p class="text-gray-800 font-semibold">QR Code Here</p>
            </div>
          </div>
        </div>

        <!-- Mimicking rectangle-2 -->
        <div class="mt-12 border-t border-gray-700 pt-8 text-center">
          <p class="text-base text-gray-400">&copy; {{ new Date().getFullYear() }} BannyaApp. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
// No script needed for this component
</script>
