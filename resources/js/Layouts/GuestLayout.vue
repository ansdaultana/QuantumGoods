<script setup>
import { defineProps } from 'vue';
const props = defineProps({
  title: String,
})

</script>

<template>


  <div class="flex min-h-screen justify-between ">
    <div class="hidden lg:block w-1/2 ">
      <img src="/Images/GuestImg.jpg" class="rounded-3xl h-screen  p-4" alt="">

    </div>
    <div class="flex items-center justify-center w-full lg:w-1/2 m-5 border-gray-500 ">
      <div class="border-gray-300 border-2 p-8 md:p-20 rounded-xl">
        <div class="flex-col items-center justify-center ">
          <div class="flex items-center justify-center ">
            <span class="font-extrabold text-3xl text-blue-500">Quantum</span>
            <span class="text-3xl">Goods</span>

          </div>
          <div class="mt-3 justify-center flex">
            Everything you want is here!
          </div>

        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <slot />
        </div>
      </div>
    </div>
  </div>

</template>

<style>
@keyframes bounce {

  0%,
  100% {
    transform: translateY(-8%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }

  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}
</style>