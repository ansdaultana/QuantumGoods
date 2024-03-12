<script setup>

import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import ProductCard from '@/Components/User/ProductCard.vue';

const page =usePage()

const Products=computed(()=>page.props.trendingProducts);
console.log(Products.value);
</script>


<template>
<div class=" w-fit  p-2">
    <div class="rounded-lg">
        <div class="text-lg font-bold p-2">
            Top Trending Products from this Week!
        </div>
        <div class="  justify-center bg-slate-200 p-2 md:p-10 rounded-lg grid grid-cols-2 lg:grid-cols-4 gap-y-4 gap-x-4 md:gap-x-10">
            <ProductCard v-for="product in Products" :key="product.id" :item="product" /> 
    </div>
</div>
</div>
</template>

