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
    <div class="flex items-center justify-center  w-full">
       
       
    </div>
</template>