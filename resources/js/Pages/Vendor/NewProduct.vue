<script setup>
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue';
import NewProductForm from '@/Components/Product/NewProductForm.vue'
import { defineOptions } from 'vue';
defineOptions({
    layout: DashboardLayout,
});
</script>


<template>
    <div class="h-screen w-full bg-slate-100">

        <div class="flex items-center justify-center">
            <NewProductForm>
            </NewProductForm>
        </div>
    </div>
</template>