<script setup>
import Sidebar from '@/Components/Vendor/Sidebar.vue'
import Navbar from '@/Components/Vendor/Navbar.vue';
</script>

<template>
    <div class="bg-slate-200">
        <Navbar />
        <div class="flex">
            <Sidebar>
            </Sidebar>
            <slot/>
        </div>
    </div>
</template>