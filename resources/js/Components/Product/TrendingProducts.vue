<script setup>

import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import ProductCard from '@/Components/User/ProductCard.vue';

const page =usePage()

const Products=computed(()=>page.props.trendingProducts);
console.log(Products.value);
</script>


<template>
<div class=" w-auto p-2 pl-10">
    <div class="rounded-lg">
        <div class="text-lg font-bold p-2">
            Top Trending Products from this Week!
        </div>
        <div class="flex flex-wrap gap-x-10 justify-center bg-slate-200 p-5 rounded-lg">
            <ProductCard v-for="product in Products" :key="product.id" :item="product" /> 
    </div>
</div>
</div>
</template>

