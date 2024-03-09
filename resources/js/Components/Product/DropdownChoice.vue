<template>
    <div :href="href" @click.prevent="selectChoice"
      class="block px-4 py-2 cursor-pointer text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
      {{ choice.name }}
    </div>
  </template>
  
  <script>
  import { defineProps, defineEmits } from 'vue';
  
  export default {
    props: {
      choice: Object,
    },
    setup(props,{emit}) {


      const selectChoice = () => {
        emit('choiceSelected', props.choice);
      };
  
      return {
        selectChoice,
      };
    },
  };
  </script>
  