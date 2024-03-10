<script setup>
import DashboardLayout from '@/Layouts/Vendor/DashboardLayout.vue'
import Card from '@/Components/Vendor/Card.vue';
import ModalDelete from '@/Components/ModalDelete.vue';
import { DeleteProduct } from '@/Navigation';
import { defineOptions,computed,ref, provide} from 'vue';

import { usePage } from '@inertiajs/vue3';

const page = usePage()

const products = computed(() => page.props.products);
defineOptions({
    layout: DashboardLayout,
});
const openModal=ref(false)
const id=ref(0)
const handleModal = (data) => {
    if (data.openModal)
    {
        openModal.value=true
        id.value=data.id
    }
    else if (data.openModal===false)
    {
        openModal.value=false
    }
    else if (data.ConfirmDelete)
    {
        openModal.value=false
        DeleteProduct(id.value)
    
    }
}
</script>

<template>
    <div class="flex items-center justify-center h-fit  w-full">
       
        <div class="bg-slate-50  p-8  w-auto m-6 h-auto grid md:grid-cols-2  lg:grid-cols-4  rounded-xl gap-x-4 gap-y-4 md:gap-y-4 ">
            <Card v-for="product in products" :key="product.id" :item="product" @delete="handleModal" :openDeleteModal="openModal">
            </Card>
            <ModalDelete v-if="openModal" :openDeleteModal="openModal" @delete="handleModal"/>
        </div>
    </div>
</template>