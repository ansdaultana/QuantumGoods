<script setup>
import EditButton from '../Product/EditButton.vue';
import DeleteButton from '../Product/DeleteButton.vue';
import {gotoEditProduct,DeleteProduct} from '@/Navigation.js'
import {ref} from 'vue'
const emit=defineEmits(['delete'])
const props=defineProps({
    item: Object,
    openDeleteModal:Boolean
})
const ConfirmDelete =()=>{
    if(props.openDeleteModal)
    {
        emit('delete', { openModal: false });

    }
    else{

        emit('delete', { openModal: true, id: props.item.id });
    }
}
</script>

<template>
    <div class="bg-white cursor-pointer shadow-sm  h-fit w-fit rounded-lg border-gray-100 border-2 transition-transform hover:scale-103 duration-200 ease-out">
       <div class="p-1">

        <div class="flex items-center justify-center p-4 h-40 w-44">
            <img class="h-auto" :src=" item.encoded_images[0]">
        </div>
        <div>
            <span v-text="item.title" class="text-md p-2 mt-1 text-gray-600"></span>
            <br>
            <span class="font-bold p-2">Rs:</span>
            <span v-text="item.price" class="text-md  font-bold"></span>
        </div>
        <div class="flex m-2 gap-x-2">
            <EditButton @click.prevent="gotoEditProduct(item.id)"/>
            <DeleteButton @click.prevent="ConfirmDelete"/>
            <!-- <ModalDelete /> -->
        </div>
    </div>
</div>

</template>