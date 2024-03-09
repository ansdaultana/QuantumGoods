<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

</script>

<template>
    <div class=" bg-white w-full h-16 shadow-sm rounded-e-md">
        <div class=" text-blue-500 font-bold text-lg flex pl-14 p-5 items-center border-b-2 border-gray-200">
            Welcome {{ user.name }}!
        </div>
    </div>

</template>