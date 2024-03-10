<script setup>
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue';
import EditProductForm from '@/Components/Product/EditProductForm.vue';
import { defineOptions } from 'vue';
defineOptions({
    layout: DashboardLayout,
});
</script>


<template>
    <EditProductForm>
    </EditProductForm>
</template>