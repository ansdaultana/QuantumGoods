<script setup>
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue';
import Form from './Form.vue'

import { defineOptions } from 'vue';
defineOptions({
    layout: DashboardLayout,
});
</script>


<template>
    <div class="h-screen w-full bg-slate-100">

        <div class="flex items-center justify-center">
            <Form  :mode="'newProduct'"/>

        </div>
    </div>
</template>