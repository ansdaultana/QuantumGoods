<script setup>
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue';
import NewProductForm from '@/Components/Product/NewProductForm.vue'
import { defineOptions } from 'vue';
defineOptions({
    layout: DashboardLayout,
});
</script>


<template>


    <NewProductForm>
    </NewProductForm>
</template>