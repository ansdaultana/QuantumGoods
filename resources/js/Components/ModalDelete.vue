<script setup>
const emit = defineEmits(['delete'])

const props = defineProps({
    openDeleteModal: Boolean,
})
const CloseModal = () => {
    if (props.openDeleteModal) {
        emit('delete', { openModal: false });

    }
}
const confirmDelete = () => {
    emit('delete', { ConfirmDelete: true });
}
</script>

<template>
    <div
        class="absolute md:top-[20%] md:left-[45%] h-auto w-auto  bg-slate-100 shadow-lg shadow-blue-200 p-8   m-6   rounded-xl  transition-transform hover:scale-103 duration-400">

        <div class="flex justify-end p-1 rounded-full -mt-8 -mr-8">
            <div @click.prevent="CloseModal" class="bg-white hover:text-red-500 rounded-full hover:bg-red-100">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>

        </div>
        <div class="text-gray-600 font-bold p-2">
            Are you sure you want to delete this item?
        </div>
        <div class="flex items-center justify-center gap-x-10 mt-5">
            <button @click.prevent="confirmDelete"
                class="bg-red-200 p-2 items-center  text-red-700  rounded-xl w-20 flex border-white hover:bg-red-300 transition-transform duration-200 hover:scale-103 ease-out">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>



                <span class="pl-1 text-sm">Yes</span>
            </button>

            <button @click.prevent="CloseModal"
                class="bg-blue-100 p-2 items-center text-blue-700  rounded-xl w-20 flex border-white hover:bg-blue-200 transition-transform duration-200 hover:scale-103 ease-out">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>

                <span class="pl-1 text-sm">No</span>
            </button>

        </div>

    </div>
</template>