<template>
  <GuestLayout>
    <main class="max-w-5xl mx-auto pt-28 pb-12 px-4 lg:px-8">
      <div class="mb-12">
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
              <Link href="/" class="inline-flex items-center text-lg font-medium text-gray-700 hover:text-green-600">
              <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
              </svg>
              หน้าแรก
              </Link>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ms-1 text-lg font-medium text-gray-500 md:ms-2">ลงทะเบียน</span>
              </div>
            </li>
          </ol>
        </nav>
      </div>

      <!-- Stepper -->
      <div class="mb-12">
        <div class="flex items-center">
          <template v-for="(step, index) in steps" :key="index">
            <div class="flex flex-col items-center">
              <div :class="[
                'w-12 h-12 rounded-full flex items-center justify-center transition-all duration-300',
                currentStep > index + 1 ? 'bg-green-600 text-white' :
                  currentStep === index + 1 ? 'bg-green-600 text-white ring-4 ring-green-200' :
                    'bg-gray-200 text-gray-500'
              ]">
                <component v-if="currentStep <= index + 1" :is="step.icon" class="w-6 h-6" />
                <Check v-else class="w-6 h-6" />
              </div>
              <p :class="['mt-2 text-sm font-medium', currentStep >= index + 1 ? 'text-green-700' : 'text-gray-500']">{{
                step.name }}</p>
            </div>
            <div v-if="index < steps.length - 1"
              :class="['flex-auto h-1 transition-all duration-500 mx-4 rounded-full', currentStep > index + 1 ? 'bg-green-600' : 'bg-gray-200']">
            </div>
          </template>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <transition name="fade" mode="out-in">
          <!-- Step 1: Buyer Information -->
          <div v-if="currentStep === 1" key="step1">
            <div class="p-8">
              <h2 class="text-2xl font-bold text-gray-800">ข้อมูลผู้ซื้อยา</h2>
              <p class="mt-1 text-gray-500">กรุณากรอกข้อมูลเกี่ยวกับสถานประกอบการของท่าน</p>

              <div class="mt-8 space-y-8">
                <!-- Qualifications -->
                <div class="space-y-4">
                  <h3 class="text-lg font-semibold text-gray-800">คุณสมบัติของท่าน <span class="text-red-500">*</span>
                  </h3>
                  <p class="text-sm text-gray-500">กรุณาเลือกช่องที่ตรงกับคุณสมบัติของท่าน (เลือกได้มากกว่า 1 ข้อ)</p>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div v-for="item in qualificationOptions" :key="item" class="flex items-center">
                      <input type="checkbox" :id="item" :value="item"
                        @change="(e) => handleQualificationChange(item, (e.target as HTMLInputElement).checked)"
                        class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                      <label :for="item" class="ml-3 text-sm text-gray-700">{{ item }}</label>
                    </div>
                  </div>
                  <div class="flex items-center pt-2">
                    <input type="checkbox" id="qual_other" value="อื่นๆ"
                      @change="(e) => handleQualificationChange('อื่นๆ', (e.target as HTMLInputElement).checked)"
                      class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="qual_other" class="ml-3 text-sm text-gray-700">อื่นๆ (โปรดระบุ):</label>
                    <input type="text" v-model="form.other_qualification"
                      class="ml-2 flex-grow block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 disabled:bg-gray-100"
                      :disabled="!form.qualifications.includes('อื่นๆ')" />
                  </div>
                </div>

                <!-- Company & Contact Info -->
                <div class="space-y-6 pt-8 border-t">
                  <h3 class="text-lg font-semibold text-gray-800">ข้อมูลบริษัทและผู้ติดต่อ</h3>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2"><label
                        class="text-sm font-medium text-gray-700">ชื่อสถานที่/ร้านยา/คลินิก/องค์กร <span
                          class="text-red-500">*</span></label><input type="text" v-model="form.company_name"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">เลขที่ใบอนุญาตร้านค้า <span
                          class="text-red-500">*</span></label><input type="text" v-model="form.license_number"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">หมายเลขบัตรประชาชน <span
                          class="text-red-500">*</span></label><input type="text" v-model="form.id_card_number"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">ชื่อ-นามสกุล ผู้ติดต่อ <span
                          class="text-red-500">*</span></label><input type="text" v-model="form.contact_person"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">เบอร์โทรศัพท์ <span
                          class="text-red-500">*</span></label><input type="text" v-model="form.phone_number"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">อีเมล</label><input type="email"
                        v-model="form.contact_email"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">วันและเวลาที่สะดวกรับสินค้า <span
                          class="text-red-500">*</span></label><input type="text" v-model="form.preferred_delivery_time"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                    </div>
                  </div>
                </div>

                <!-- Shipping Address -->
                <div class="space-y-6 pt-8 border-t">
                  <h3 class="text-lg font-semibold text-gray-800">ที่อยู่สำหรับจัดส่ง</h3>
                  <div class="md:col-span-2"><label class="text-sm font-medium text-gray-700">ที่อยู่ (บ้านเลขที่, หมู่,
                      ถนน)
                      <span class="text-red-500">*</span></label><textarea v-model="form.shipping_address" rows="3"
                      class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"></textarea>
                  </div>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                      <label class="text-sm font-medium text-gray-700">จังหวัด <span
                          class="text-red-500">*</span></label>
                      <div class="relative mt-1">
                        <select v-model="form.province_id" @change="getDistricts"
                          class="appearance-none block w-full pl-3 pr-10 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                          <option disabled value="">เลือกจังหวัด</option>
                          <option v-for="p in provinces" :key="p.id" :value="p.id">{{ p.name }}</option>
                        </select>
                        <div
                          class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                              clip-rule="evenodd" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div>
                      <label class="text-sm font-medium text-gray-700">อำเภอ/เขต <span
                          class="text-red-500">*</span></label>
                      <div class="relative mt-1">
                        <select v-model="form.district_id" @change="getTombons"
                          class="appearance-none block w-full pl-3 pr-10 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                          <option disabled value="">เลือกอำเภอ/เขต</option>
                          <option v-for="d in districts" :key="d.id" :value="d.id">{{ d.name }}</option>
                        </select>
                        <div
                          class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                              clip-rule="evenodd" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div>
                      <label class="text-sm font-medium text-gray-700">ตำบล/แขวง <span
                          class="text-red-500">*</span></label>
                      <div class="relative mt-1">
                        <select v-model="form.tombon_id" @change="setZipcode"
                          class="appearance-none block w-full pl-3 pr-10 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                          <option disabled value="">เลือกตำบล/แขวง</option>
                          <option v-for="t in tombons" :key="t.id" :value="t.id">{{ t.name }}</option>
                        </select>
                        <div
                          class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                          <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                              clip-rule="evenodd" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div><label class="text-sm font-medium text-gray-700">รหัสไปรษณีย์ <span
                          class="text-red-500">*</span></Label><input type="text" v-model="form.zip_code"
                        class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                        readonly></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex justify-end p-6 bg-gray-50 border-t">
              <button @click="nextStep"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">ถัดไป</button>
            </div>
          </div>

          <!-- Step 2: Document Information -->
          <div v-else-if="currentStep === 2" key="step2">
            <div class="p-8">
              <h2 class="text-2xl font-bold text-gray-800">ข้อมูลเอกสาร</h2>
              <p class="mt-1 text-gray-500">กรุณาอัปโหลดเอกสารที่จำเป็นสำหรับการยืนยันตัวตน</p>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div><label class="text-sm font-medium text-gray-700">สำเนาใบประกอบวิชาชีพ <span
                      class="text-red-500">*</span></label><input type="file"
                    @input="e => form.doc_professional_license = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
                <div><label class="text-sm font-medium text-gray-700">สำเนาบัตรประชาชนผู้มีอำนาจสั่งซื้อ <span
                      class="text-red-500">*</span></label><input type="file"
                    @input="e => form.doc_id_card = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
                <div><label class="text-sm font-medium text-gray-700">สำเนาใบอนุญาตประกอบกิจการสถานพยาบาล <span
                      class="text-red-500">*</span></label><input type="file"
                    @input="e => form.doc_establishment_license = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
                <div><label class="text-sm font-medium text-gray-700">สำเนาใบอนุญาตดำเนินการสถานพยาบาล <span
                      class="text-red-500">*</span></label><input type="file"
                    @input="e => form.doc_operating_license = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
                <div><label class="text-sm font-medium text-gray-700">รูปถ่ายหน้าร้าน</label><input type="file"
                    @input="e => form.doc_store_photo = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
                <div><label class="text-sm font-medium text-gray-700">สำเนาใบทะเบียนพาณิชย์
                    (ถ้ามีกรณีนิติบุคคล)</label><input type="file"
                    @input="e => form.doc_commercial_registration = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
                <div><label class="text-sm font-medium text-gray-700">สำเนาใบอนุญาตอื่นๆ</label><input type="file"
                    @input="e => form.doc_other = (e.target as HTMLInputElement).files?.[0]"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" />
                </div>
              </div>
            </div>
            <div class="flex justify-between p-6 bg-gray-50 border-t">
              <button @click="prevStep"
                class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">ย้อนกลับ</button>
              <button @click="nextStep"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">ถัดไป</button>
            </div>
          </div>

          <!-- Step 3: Login Information -->
          <div v-else-if="currentStep === 3" key="step3">
            <div class="p-8">
              <h2 class="text-2xl font-bold text-gray-800">ข้อมูลเข้าสู่ระบบ</h2>
              <p class="mt-1 text-gray-500">ตั้งค่าข้อมูลสำหรับใช้เข้าสู่ระบบในครั้งถัดไป</p>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                <div><label class="text-sm font-medium text-gray-700">ชื่อผู้ใช้งาน <span
                      class="text-red-500">*</span></label><input type="text" v-model="form.username"
                    class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                  <p class="mt-1 text-xs text-gray-500">ชื่อผู้ใช้งานควรอยู่ระหว่าง 3-20 ตัวอักษร</p>
                </div>
                <div><label class="text-sm font-medium text-gray-700">อีเมล <span
                      class="text-red-500">*</span></label><input type="email" v-model="form.email"
                    class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                <div><label class="text-sm font-medium text-gray-700">รหัสผ่าน <span
                      class="text-red-500">*</span></label><input type="password" v-model="form.password"
                    class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                  <p class="mt-1 text-xs text-gray-500">ควรมีความยาว 6 ตัวอักษรขึ้นไป</p>
                </div>
                <div><label class="text-sm font-medium text-gray-700">ยืนยันรหัสผ่าน <span
                      class="text-red-500">*</span></Label><input type="password" v-model="form.password_confirmation"
                    class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
                <div><label class="text-sm font-medium text-gray-700">เบอร์โทรศัพท์ <span
                      class="text-red-500">*</span></label><input type="text" v-model="form.login_phone"
                    class="mt-1 block w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
              </div>
            </div>
            <div class="flex justify-between p-6 bg-gray-50 border-t">
              <button @click="prevStep"
                class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">ย้อนกลับ</button>
              <button @click="submit" :disabled="form.processing"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 disabled:bg-green-400">
                <Loader2 v-if="form.processing" class="mr-2 h-5 w-5 animate-spin" />
                สมัครสมาชิก
              </button>
            </div>
          </div>
        </transition>
      </div>
      <p class="text-center mt-8 text-gray-600">
        มีบัญชีอยู่แล้ว ?
        <Link href="/login" class="font-medium text-green-600 hover:text-green-500">เข้าสู่ระบบ</Link>
      </p>
    </main>
  </GuestLayout>
</template>

<script setup lang="ts">
import { ref, shallowRef, watch, onMounted } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { User, FileText, Lock, Check, Loader2 } from 'lucide-vue-next';
import axios from 'axios';

const { provinces } = defineProps<{
  provinces: App.Models.Province[];
}>();

console.log('Provinces received:', provinces);

const districts = ref<App.Models.District[]>([]);
const tombons = ref<App.Models.Tombon[]>([]);

const currentStep = ref(1);

const steps = shallowRef([
  { name: 'ข้อมูลผู้ซื้อ', icon: User },
  { name: 'ข้อมูลเอกสาร', icon: FileText },
  { name: 'ข้อมูลเข้าสู่ระบบ', icon: Lock },
]);

const nextStep = () => {
  if (currentStep.value < 3) {
    currentStep.value++;
  }
};

const prevStep = () => {
  if (currentStep.value > 1) {
    currentStep.value--;
  }
};

const form = useForm({
  qualifications: [] as string[],
  other_qualification: '',
  company_name: '',
  license_number: '',
  id_card_number: '',
  contact_person: '',
  phone_number: '',
  contact_email: '',
  shipping_address: '',
  province_id: '' as string | '',
  district_id: '' as string | '',
  tombon_id: '' as string | '',
  zip_code: '',
  preferred_delivery_time: '',
  doc_professional_license: null as File | null | undefined,
  doc_id_card: null as File | null | undefined,
  doc_establishment_license: null as File | null | undefined,
  doc_operating_license: null as File | null | undefined,
  doc_store_photo: null as File | null | undefined,
  doc_commercial_registration: null as File | null | undefined,
  doc_other: null as File | null | undefined,
  username: '',
  email: '',
  password: '',
  password_confirmation: '',
  login_phone: '',
});

const qualificationOptions = ref([
  'ร้านขายยาแผนปัจจุบัน (ขย.1)',
  'คลินิก/โรงพยาบาล (ภาครัฐ/เอกชน)',
  'หน่วยงานของรัฐ',
  'บริษัทขายส่งยาแผนปัจจุบัน (ขย.4)',
  'สถานประกอบการที่มีใบอนุญาตครอบครองยาเพื่อใช้ภายใน',
]);

const handleQualificationChange = (item: string, checked: boolean) => {
  if (checked) {
    if (!form.qualifications.includes(item)) {
      form.qualifications.push(item);
    }
  } else {
    form.qualifications = form.qualifications.filter(q => q !== item);
  }
};

const getDistricts = async () => {
  console.log('getDistricts called. form.province_id:', form.province_id);
  if (!form.province_id) {
    districts.value = [];
    form.district_id = '';
    tombons.value = [];
    form.tombon_id = '';
    form.zip_code = '';
    console.log('province_id is empty, returning.');
    return;
  }
  try {
    const url = `/api/address/provinces/${form.province_id}/districts`;
    console.log(`Fetching districts from URL: ${url}`);
    const response = await axios.get(url);
    districts.value = response.data;
    form.district_id = '';
    tombons.value = [];
    form.tombon_id = '';
    form.zip_code = '';
    console.log('Districts fetched:', districts.value);
  } catch (error) {
    console.error('Error fetching districts:', error);
    districts.value = [];
    form.district_id = '';
    tombons.value = [];
    form.tombon_id = '';
    form.zip_code = '';
  }
};

const getTombons = async () => {
  console.log('getTombons called. form.district_id:', form.district_id);
  if (!form.district_id) {
    tombons.value = [];
    form.tombon_id = '';
    form.zip_code = '';
    console.log('district_id is empty, returning.');
    return;
  }
  try {
    const url = `/api/address/districts/${form.district_id}/tombons`;
    console.log(`Fetching tombons from URL: ${url}`);
    const response = await axios.get(url);
    tombons.value = response.data;
    form.tombon_id = '';
    form.zip_code = '';
    console.log('Tombons fetched:', tombons.value);
  } catch (error) {
    console.error('Error fetching tombons:', error);
    tombons.value = [];
    form.tombon_id = '';
    form.zip_code = '';
  }
};

const setZipcode = async () => {
  console.log('setZipcode called. form.tombon_id:', form.tombon_id);
  if (!form.tombon_id) {
    form.zip_code = '';
    console.log('tombon_id is empty, returning.');
    return;
  }
  try {
    const url = `/api/address/tombons/${form.tombon_id}`;
    console.log(`Fetching tombon for URL: ${url}`);
    const response = await axios.get(url);
    form.zip_code = response.data.zip_code;
    console.log('Zipcode set to:', form.zip_code);
  } catch (error) {
    console.error('Error fetching tombon zip code:', error);
    form.zip_code = '';
  }
};

onMounted(() => {
  if (provinces.length > 0) {
    form.province_id = provinces[0].id;
  }
});

watch(() => form.province_id, getDistricts, { immediate: true });
watch(() => form.district_id, getTombons);
watch(() => form.tombon_id, setZipcode);

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s ease-in-out;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(20px);
}
</style>
