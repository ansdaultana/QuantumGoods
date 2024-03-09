<script setup>
const props = defineProps({
    url: {
        type: String,
    },
});

</script>

<template>
    <div class="cursor-pointer border-gray-100 bg-slate-100 w-20 h-20 rounded-lg flex items-center justify-center mt-2">
        <div>
            <img class="rounded-lg" :src="props.url" alt="">

        </div>

    </div>
</template>