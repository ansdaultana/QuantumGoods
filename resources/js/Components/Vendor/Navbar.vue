<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { gotoHome } from '@/Navigation';

const page = usePage();
const user = computed(() => page.props.auth.user);

</script>

<template>
    <div class=" bg-white w-full h-16 shadow-sm rounded-e-md flex justify-between ">
        <div class="text-blue-500   font-extrabold  md:text-xl p-5 cursor-pointer " @click.prevent="gotoHome">Quantum Goods</div>

        <div class=" text-blue-500 font-bold md:text-lg flex w-50  p-5 items-center  ">
            Welcome {{ user.name }}!
        </div>
    </div>

</template>