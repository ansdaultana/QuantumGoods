<script setup>
import {AddOrRemoveFavouriteitem,AddOrRemoveCartItem} from '@/Navigation.js'
import {ref} from 'vue'
const emit=defineEmits(['delete'])
const props=defineProps({
    item: Object,
    openDeleteModal:Boolean
})

</script>

<template>
    <div class="bg-white cursor-pointer shadow-sm  h-fit w-fit rounded-lg border-gray-100 border-2 transition-transform hover:scale-103 duration-200 ease-out">
       <div class="p-1">

        <div class="flex items-center justify-center p-4 h-32 w-36 md:h-40 md:w-44">
            <img class="h-auto" :src=" item.encoded_image">
        </div>
        <div>
            <div class="flex justify-between pr-5">
            <span v-text="item.title" class="text-xs md:text-sm p-1 md:p-2 mt-1  text-gray-600"></span>

                <div class="text-blue-600 animate-pulse mt-2"   :class="{ 'animate-none': item.is_favourited }"  @click.prevent="AddOrRemoveFavouriteitem(item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                    :class="{ 'fill-blue-500': item.is_favourited }"
                    class="w-6 h-6 hover:scale-105 transition-transform duration-300 ease-in-out hover:animate-none hover:fill-blue-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                      </svg>
                      
                </div>
            </div>
            <span class="font-bold p-2">Rs:</span>
            <span v-text="item.price" class="text-md  font-bold"></span>
        </div>
        <div class=" m-2 p-1 md:p-5 justify-between " @click.prevent="AddOrRemoveCartItem(item.id)">
            <div class="px-2 md:px-4 py-2 bg-blue-500 rounded-lg text-white flex hover:scale-105 transition-transform duration-300 ease-in-out">
                <svg v-if="!item.is_in_cart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                  </svg>
                  <svg v-if="item.is_in_cart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                  </svg>
                  
                <span v-if="!item.is_in_cart" class="text-xs pl-2 mt-1">
                    Add to Cart
                </span>

                <span v-if="item.is_in_cart" class="text-xs pl-2 mt-1">
                    Added
                </span>
                
                  
                  
            </div>
         
        </div>
    </div>
</div>

</template>