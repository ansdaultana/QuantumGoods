<script setup>
import Sidebar from '@/Components/Vendor/Sidebar.vue'
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue'
import Card from '@/Components/Vendor/Card.vue';
import { defineOptions,computed } from 'vue';

import { usePage } from '@inertiajs/vue3';

const page = usePage()

const products = computed(() => page.props.products);
defineOptions({
    layout: DashboardLayout,
});
</script>

<template>
    <div class="flex items-center justify-center h-fit  w-full">
       
        <div class="bg-slate-50  p-8  w-auto m-6 h-auto grid md:grid-cols-2  lg:grid-cols-4  rounded-xl gap-x-4 gap-y-4 md:gap-y-4 ">
            <Card v-for="product in products" :key="product.id" :item="product">
            </Card>
        </div>
    </div>
</template>