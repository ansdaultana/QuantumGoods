<script setup>
import Navbar from '../Components/Navbar.vue'
import CategoryBar from '@/Components/CategoryBar.vue';
import Footer from '@/Components/Footer.vue';
import ImageSlider from '@/Components/ImageSlider.vue'
</script>

<template>
<Navbar/>
<div class="bg-slate-100 text-sm h-screen">
<CategoryBar/>
<ImageSlider/>
</div>
<Footer/>
</template>