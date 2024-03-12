<script setup>
import Navbar from '../Components/Navbar.vue'
import CategoryBar from '@/Components/CategoryBar.vue';
import Footer from '@/Components/Footer.vue';
import ImageSlider from '@/Components/ImageSlider.vue'
import TrendingProducts from '@/Components/Product/TrendingProducts.vue'
import { Head } from '@inertiajs/vue3';

</script>

<template>

    <Head title="Home" />

    <Navbar />
    <div class="bg-slate-100 text-sm">
        <div >
            <CategoryBar />
            <div class="h-60 md:h-96">
                <ImageSlider />
    
            </div>
        </div>
        <div class="flex items-center justify-center">
            <TrendingProducts />

        </div>

    </div>


    <Footer />
</template>