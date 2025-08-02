<template>
    <AuthBase>
        <Head title="เข้าสู่ระบบ" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <!-- Username/Email Input -->
            <div class="grid gap-2">
                <Label for="email" class="text-base font-medium text-gray-700">ชื่อผู้ใช้ <span class="text-red-500">*</span> :</Label>
                <Input
                    id="email"
                    type="email"
                    required
                    autofocus
                    :tabindex="1"
                    autocomplete="email"
                    v-model="form.email"
                    placeholder="กรุณาใส่ชื่อผู้ใช้ของคุณ"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 ease-in-out"
                />
                <InputError :message="form.errors.email" />
            </div>

            <!-- Password Input -->
            <div class="grid gap-2">
                <div class="flex items-center justify-between">
                    <Label for="password" class="text-base font-medium text-gray-700">รหัสผ่าน <span class="text-red-500">*</span> :</Label>
                </div>
                <div class="relative">
                    <Input
                        id="password"
                        :type="passwordFieldType"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        v-model="form.password"
                        placeholder="กรุณาใส่รหัสผ่านของคุณ"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 ease-in-out pr-10"
                    />
                    <button type="button" @click="togglePasswordVisibility" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <EyeIcon v-if="passwordFieldType === 'password'" class="h-5 w-5" />
                        <EyeOffIcon v-else class="h-5 w-5" />
                    </button>
                </div>
                <InputError :message="form.errors.password" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <Label for="remember" class="flex items-center space-x-2 text-gray-700">
                    <Checkbox id="remember" v-model="form.remember" :tabindex="3" class="form-checkbox h-5 w-5 text-green-600 rounded focus:ring-green-500" />
                    <span>จดจำฉัน</span>
                </Label>
                <TextLink v-if="canResetPassword" :href="route('password.request')" class="text-sm text-blue-600 hover:text-blue-800 transition duration-200 ease-in-out" :tabindex="5">
                    ลืมรหัสผ่าน
                </TextLink>
            </div>

            <!-- Login Button -->
            <Button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-200 ease-in-out shadow-md hover:shadow-lg text-lg font-semibold" :tabindex="4" :disabled="form.processing">
                <LoaderCircle v-if="form.processing" class="h-5 w-5 animate-spin mr-2" />
                เข้าสู่ระบบ
            </Button>
        </form>

        <!-- Register Link -->
        <div class="text-center text-base text-gray-600 mt-4">
            ยังไม่มีบัญชีผู้ใช้?
            <TextLink :href="route('register')" class="text-green-600 hover:text-green-800 transition duration-200 ease-in-out font-semibold" :tabindex="5">ลงทะเบียน</TextLink>
        </div>
    </AuthBase>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle, EyeIcon, EyeOffIcon } from 'lucide-vue-next';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const passwordFieldType = ref('password');

const togglePasswordVisibility = () => {
  passwordFieldType.value = passwordFieldType.value === 'password' ? 'text' : 'password';
};

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
