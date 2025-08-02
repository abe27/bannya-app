<template>
  <nav :class="{ 'bg-white/80 backdrop-blur-md shadow-md': isScrolled, 'bg-transparent': !isScrolled }"
    class="fixed w-full z-50 transition-all duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <Link href="/">
            <img class="h-20 w-auto" src="/images/logo.png" alt="BannyaApp Logo">
            </Link>
          </div>
        </div>
        <div class="hidden md:flex items-baseline space-x-4">
          <Link href="/" class="text-gray-600 hover:text-green-700 px-3 py-2 rounded-md text-lg font-medium">หน้าแรก
          </Link>
          <Link href="/products" class="text-gray-600 hover:text-green-700 px-3 py-2 rounded-md text-lg font-medium">
          สินค้า</Link>
          <Link href="/articles" class="text-gray-600 hover:text-green-700 px-3 py-2 rounded-md text-lg font-medium">
          บทความ</Link>
          <Link href="/contact" class="text-gray-600 hover:text-green-700 px-3 py-2 rounded-md text-lg font-medium">
          ติดต่อเรา</Link>
        </div>
        <div class="hidden md:flex items-center space-x-2">
          <template v-if="!$page.props.auth.user">
            <Link href="/login" class="text-gray-600 hover:text-green-700 px-4 py-2 rounded-md text-lg font-medium">
            เข้าสู่ระบบ</Link>
            <Link href="/register"
              class="bg-green-600 text-white px-5 py-2.5 rounded-full hover:bg-green-700 transition duration-300 ease-in-out shadow-md hover:shadow-lg text-lg font-medium">
            ลงทะเบียน</Link>
          </template>
          <template v-else>
            <DropdownMenu>
              <DropdownMenuTrigger as-child>
                <button
                  class="flex items-center space-x-2 text-gray-800 hover:text-green-700 px-4 py-2 rounded-full transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                  <Avatar class="h-9 w-9">
                    <AvatarImage v-if="$page.props.auth.user.avatar" :src="$page.props.auth.user.avatar"
                      :alt="$page.props.auth.user.name" />
                    <AvatarFallback class="bg-green-200 text-green-800 font-semibold">{{
                      getInitials($page.props.auth.user.name) }}</AvatarFallback>
                  </Avatar>
                  <span class="text-lg font-medium">{{ $page.props.auth.user.name }}</span>
                  <svg class="w-4 h-4 ml-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="end"
                class="w-64 mt-2 bg-white rounded-lg shadow-xl ring-1 ring-gray-200 focus:outline-none p-2">
                <template v-for="(item, index) in userMenuItems" :key="index">
                  <DropdownMenuSeparator v-if="item.isSeparator" class="my-1" />
                  <DropdownMenuItem v-else as-child class="hover:bg-green-50 rounded-md transition duration-150 ease-in-out hover:cursor-pointer">
                    <Link :href="item.href" class="flex items-center w-full px-4 py-2 text-gray-700 hover:text-green-800">
                      <component :is="icons[item.icon]" class="mr-2 h-5 w-5" />
                      <span>{{ item.label }}</span>
                    </Link>
                  </DropdownMenuItem>
                </template>
                <DropdownMenuSeparator class="my-1" />
                <DropdownMenuItem as-child
                  class="hover:bg-red-50 rounded-md transition duration-150 ease-in-out hover:cursor-pointer">
                  <Link :href="route('logout')" method="post" as="button"
                    class="flex items-center w-full px-4 py-2 text-red-600 hover:text-red-800">
                  <LogOut class="mr-2 h-5 w-5" /><span>ออกจากระบบ</span></Link>
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>
          </template>
        </div>
        <div class="-mr-2 flex md:hidden">
          <button @click="isOpen = !isOpen" type="button"
            class="bg-gray-200 inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div v-if="isOpen" class="md:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white/95 backdrop-blur-md">
        <Link href="/"
          class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium">
        หน้าแรก</Link>
        <Link href="/products"
          class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium">
        สินค้า</Link>
        <Link href="/articles"
          class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium">
        บทความ</Link>
        <Link href="/contact"
          class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium">
        ติดต่อเรา</Link>
        <hr class="my-2 border-gray-200">
        <template v-if="!$page.props.auth.user">
          <Link href="/login"
            class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium">
          เข้าสู่ระบบ</Link>
          <Link href="/register"
            class="bg-green-600 text-white block px-3 py-2 rounded-md text-base font-medium text-center">ลงทะเบียน
          </Link>
        </template>
        <template v-else>
            <Link v-for="(item, index) in mobileUserMenuItems" :key="index" :href="item.href"
                class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium">
                {{ item.label }}
            </Link>
            <hr class="my-2 border-gray-200">
            <Link :href="route('logout')" method="post" as="button"
                class="text-gray-600 hover:bg-green-100 hover:text-green-700 block px-3 py-2 rounded-md text-base font-medium text-left">
            ออกจากระบบ</Link>
        </template>
      </div>
    </div>
  </nav>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed, shallowRef } from 'vue';
import { Link } from '@inertiajs/vue3';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuTrigger, DropdownMenuSeparator } from '@/components/ui/dropdown-menu';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { getInitials } from '@/composables/useInitials';
import { LayoutGrid, User, Star, ShoppingCart, Award, BarChart, Share2, Tag, MessageSquare, Heart, Eye, Gift, LogOut } from 'lucide-vue-next';

const isOpen = ref(false);
const isScrolled = ref(false);

const handleScroll = () => {
  isScrolled.value = window.scrollY > 10;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

const icons = shallowRef({
  LayoutGrid, User, Star, ShoppingCart, Award, BarChart, Share2, Tag, MessageSquare, Heart, Eye, Gift, LogOut
});

interface MenuItem {
    href: string;
    label: string;
    icon: keyof typeof icons.value;
    isSeparator?: false;
}

interface MenuSeparator {
    isSeparator: true;
}

type UserMenuItem = MenuItem | MenuSeparator;


const userMenuItems = ref<UserMenuItem[]>([
  { href: '/dashboard', label: 'จัดการระบบ', icon: 'LayoutGrid' },
  { isSeparator: true },
  { href: '#', label: 'บัญชีของฉัน', icon: 'User' },
  { href: '#', label: 'แต้มของฉัน', icon: 'Star' },
  { href: '#', label: 'คำสั่งซื้อของฉัน', icon: 'ShoppingCart' },
  { href: '#', label: 'แต้ม', icon: 'Award' },
  { href: '#', label: 'สถิติ', icon: 'BarChart' },
  { href: '#', label: 'แนะนำเพื่อน', icon: 'Share2' },
  { href: '#', label: 'รหัสส่วนลดของฉัน', icon: 'Tag' },
  { href: '#', label: 'ความคิดเห็นของฉัน', icon: 'MessageSquare' },
  { href: '#', label: 'สินค้าที่สนใจ', icon: 'Heart' },
  { href: '#', label: 'สินค้าเปิดดู', icon: 'Eye' },
  { href: '#', label: 'กิจกรรมรางวัล', icon: 'Gift' },
]);

const mobileUserMenuItems = computed(() => userMenuItems.value.filter((item): item is MenuItem => !item.isSeparator));
</script>
