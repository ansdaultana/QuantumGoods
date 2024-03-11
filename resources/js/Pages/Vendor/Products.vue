<script setup>
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue'
import Card from '@/Components/Vendor/Card.vue';
import ModalDelete from '@/Components/ModalDelete.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { DeleteProduct,gotoNewProduct } from '@/Navigation';
import { defineOptions, computed, ref, provide } from 'vue';

import { usePage } from '@inertiajs/vue3';

const page = usePage()

const products = computed(() => page.props.products);
defineOptions({
    layout: DashboardLayout,
});
const openModal = ref(false)
const id = ref(0)
const handleModal = (data) => {
    if (data.openModal) {
        openModal.value = true
        id.value = data.id
    }
    else if (data.openModal === false) {
        openModal.value = false
    }
    else if (data.ConfirmDelete) {
        openModal.value = false
        DeleteProduct(id.value)

    }
}
</script>

<template>
    <div class="flex items-center justify-center h-fit  w-full">

        <div v-if="products.length > 0"
            class="bg-slate-50  p-8  w-auto m-6 h-auto grid md:grid-cols-2  lg:grid-cols-4  rounded-xl gap-x-4 gap-y-4 md:gap-y-4 ">
            <Card v-for="product in products" :key="product.id" :item="product" @delete="handleModal"
                :openDeleteModal="openModal">
            </Card>
            <ModalDelete v-if="openModal" :openDeleteModal="openModal" @delete="handleModal" />
        </div>
        <div v-if="products.length == 0">
            <div class="bg-slate-50 p-5 md:m-20 m-5 rounded-lg">
                <h1 class=" m-5 text-blue-500 md:text-2xl text-center">No Products Found</h1>
                <div class="flex m-5 text-blue-500 md:text-2xl text-center">
                    <h1 class="  ">Create New Product!
                    </h1>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-9 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                    </svg>
                    <div @click.prevent="gotoNewProduct" class="bg-slate-200 rounded-lg cursor-pointer p-2 transition-transform hover:scale-105 hover:bg-slate-300 hover:font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                          </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>