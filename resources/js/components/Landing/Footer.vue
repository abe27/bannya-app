<template>
  <footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div>
          <h3 class="font-bold text-2xl mb-4">ร้านขายยา บ้านยาเอื้ออาทร</h3>
          <p class="text-gray-400 text-base leading-relaxed">ใบอนุญาตขายยาแผนปัจจุบันเลขที่ xxxxxxx</p>
          <p class="mt-3 text-gray-400 text-base leading-relaxed">บริษัท ออลเนอร์จี เมดิคอล อิควิปเมนท์ จำกัด</p>
          <p class="text-gray-400 text-base leading-relaxed">ALLNERGY MEDICAL EQUIPMENT CO., LTD.</p>
        </div>
        <div>
          <h3 class="font-bold text-2xl mb-4">ติดต่อเรา</h3>
          <ul class="space-y-3 text-gray-400 text-lg">
            <li class="flex items-center"><svg class="w-6 h-6 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>ที่อยู่: 70/112 หมู่บ้านเอื้ออาทร ต.ลาดขวาง อ.บ้านโพธิ์ จ.ฉะเชิงเทรา</li>
            <li class="flex items-center"><svg class="w-6 h-6 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>โทร: 098-2496558, 038-088583</li>
            <li class="flex items-center"><svg class="w-6 h-6 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>อีเมล: yourmail@gmail.com</li>
          </ul>
        </div>
        <div>
          <h3 class="font-bold text-2xl mb-4">ติดตามเรา</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition duration-300 ease-in-out"><img src="/images/facebook.svg" class="h-8 w-8"></a>
            <a href="#" class="text-gray-400 hover:text-white transition duration-300 ease-in-out"><img src="/images/instagram.svg" class="h-8 w-8"></a>
            <a href="#" class="text-gray-400 hover:text-white transition duration-300 ease-in-out"><img src="/images/line-logo.svg" class="h-8 w-8"></a>
          </div>
        </div>
      </div>
      <div class="mt-10 border-t border-gray-700 pt-8 text-center text-gray-500 text-base">
        <p>&copy; {{ new Date().getFullYear() }} BannyaApp. All rights reserved.</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
// No script needed for this component
</script>
