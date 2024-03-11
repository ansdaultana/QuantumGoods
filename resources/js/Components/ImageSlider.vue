<template>
  <div class="slider-container p-2 md:p-8 rounded-lg h-auto">
    <div class="slider bg-slate-100 "> <!-- Set a fixed background color here -->
      
      <div class="flex items-center justify-center">
        <transition name="slide" mode="out-in">
          <img :key="currentIndex" :src="currentImage" class="h-40 md:h-72 rounded-lg slider-image" alt="Slider Image">
        </transition>
      </div>

      <div class=" -mt-24 md:-mt-40   flex md:px-20 lg:px-48 justify-between ">
        <button @click="prevImage" class="rounded-full m-1 ">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-white h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>
        <button @click="nextImage" class="rounded-full m-1 ">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 text-white h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div> 
      
    </div>
  </div>
</template>

  
  <script setup>
  import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
  
  const images = ref([
    '/Home1.png',
    '/Home2.jpg',
    '/Home3.jpg',
  ]);
  
  const currentIndex = ref(0);
  
  const currentImage = computed(() => images.value[currentIndex.value]);
  
  const prevImage = () => {
    currentIndex.value = (currentIndex.value - 1 + images.value.length) % images.value.length;
  };
  
  const nextImage = () => {
    currentIndex.value = (currentIndex.value + 1) % images.value.length;
  };
  
  const goToImage = (index) => {
    currentIndex.value = index;
  };
  
  onMounted(() => {
    const autoChangeInterval = setInterval(nextImage, 3000);
  
    onBeforeUnmount(() => {
      clearInterval(autoChangeInterval);
    });
  });
  </script>
  
  <style scoped>
  .indicator-dots .dot {
    background-color: #000;
  }
  
  .indicator-dots .dot.bg-white {
    background-color: #fff;
  }
  .nav-buttons {
    display: flex;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    transform: translateY(-50%);
    width: 100%;
  }
  
.slide-enter-active, .slide-leave-active {
    transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
  }
  
 

.slider.hidden {
    opacity: 0;
    pointer-events: none; 
    
}
  </style>
  