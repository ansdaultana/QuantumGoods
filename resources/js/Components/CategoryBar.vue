<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page =usePage()

const categories=computed(()=>page.props.categories);

</script>


<template>
    <div class=" justify-center flex  md:gap-x-6  ">

        <div v-for=" category, index in categories" :key="category.id" >
            <div class="flex gap-5 mt-3">

                <h4 v-text="category.name" class="text-xs md:text-sm hover:cursor-pointer hover:bg-white p-1 md:p-2 rounded-lg hover:scale-103 transition-transform duration-200 ease-in-out hover:text-primary"></h4>
                <span v-if="index < categories.length - 1" class="separator mt-1.5 md:mt-2"> | </span>
            </div>
           
  
        </div>
    </div>
</template>