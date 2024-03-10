<script setup>
const props = defineProps({
    mode: String,
    product: Object,
});
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import UploadImageButton from './UploadImageButton.vue';
import PrimaryButton from '../PrimaryButton.vue';
import ImageBox from './ImageBox.vue';
import Dropdown from '../Dropdown.vue';
import DropdownChoice from './DropdownChoice.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const page = usePage()

const categories = computed(() => page.props.categories);
const category_temp = ref('Select Category');
const fileInput = ref(null);
const acceptedImageTypes = ['image/jpeg', 'image/png'];
const ImagesViewLocal = ref([]);
const ImagesError = ref('');

const form = useForm({
    title: '',
    description: '',
    images: [],
    price: 0,
    category: 0,
    quantity: 0
});
if (props.mode === 'editProduct') {
    form.title = props.product.title;
    form.description = props.product.description;
    form.images = props.product.encoded_images;
    form.price = props.product.price;
    form.category = props.product.category_id;
    form.quantity = props.product.quantity;
    
    ImagesViewLocal.value = props.product.encoded_images.map(image => ({ url: image }));
    const selectedCategory = categories.value.find(category => category.id === props.product.category_id);
    if (selectedCategory) {
        category_temp.value = selectedCategory.name;
    }

}
const updateCategory = (selectedCategory) => {
    form.category = selectedCategory.id;
    category_temp.value = selectedCategory.name;

};


const submit = () => {
    if (form.images.length < 1) {
        ImagesError.value = 'Please Add Atleast 1 picture.';
    }
    else if (form.quantity === 0) {
        form.errors.quantity = 'Please Add Number of Items You have.';
    }
    else if (form.price === 0) {
        form.errors.price = 'Please Add the price of the Product.';
    }
    else if (form.category === 0) {
        form.errors.category = 'Please Select A Category.';
        category_temp.value = 'Select Category';
    }
    else {
        console.log('here')
        if (props.mode === 'editProduct') {
        console.log('Edit')

            form.transform(data => ({
                ...data,
                remember: form.remember ? 'on' : '',
            })).post(`/vendor/dashboard/editproduct/${props.product.id}`, {
                onFinish: () => form.reset('title', 'description', 'price', 'quantity', 'category'),
            });
        }
        else if (props.mode === 'newProduct') {
        console.log('new')

            form.transform(data => ({
                ...data,
            })).post(route('product.new'));
        }
    }
};

const handleButtonClick = () => {
    fileInput.value.click();
};

const ImagesUpload = () => {
    const files = fileInput.value.files;

    for (const file of files) {
        if (acceptedImageTypes.includes(file.type)) {
            const imageUrl = URL.createObjectURL(file);

            if (ImagesViewLocal.value.length < 4) {
                ImagesViewLocal.value.push({ url: imageUrl });
                form.images.push(file);
                console.log(form.images)
            } else {
                ImagesError.value = 'Maximum of 4 images allowed.';
                break;
            }
        } else {
            ImagesError.value = 'Image is not in Jpeg or Png format.';
        }
    }
};
</script>

<template>
    <div class="bg-white w-1/2 rounded-xl shadow-blue-100 shadow-md h-auto m-10 p-10">
        <div class="-mt-3 pb-2 text-blue-500 font-bold"> Create New Product!</div>
        <form @submit.prevent="submit">
            <div>

                <InputLabel for="title" value="Title"></InputLabel>
                <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus
                    autocomplete="title" placeholder="Rolex Watch" />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="mt-2">
                <InputLabel for="description" value="Description"></InputLabel>
                <TextArea id="description" type="text" class="mt-1 block w-full" v-model="form.description" required
                    autocomplete="description" />
                <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="mt-2">
                <InputLabel for="category" value="Choose Category"></InputLabel>
                <div class="mt-2">
                </div>

                <Dropdown v-model="form.category" align="left" width="52">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-slate-200 hover:bg-slate-300 hover:text-gray-800 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ category_temp }}
                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>

                        <DropdownChoice v-for="category in categories" :key="category.id" :choice="category"
                            @choiceSelected="updateCategory">
                            {{ category.name }}
                        </DropdownChoice>


                    </template>


                </Dropdown>
                <InputError class="mt-2" :message="form.errors.category" />

            </div>
            <div class="mt-2 flex justify-between">
                <div>
                    <InputLabel for="price" value="Price"></InputLabel>
                    <TextInput id="price" step="any" type="number" class="mt-1 block w-full" v-model="form.price"
                        required autofocus autocomplete="price" />
                    <InputError class="mt-2" :message="form.errors.price" />
                </div>
                <div>
                    <InputLabel for="quantity" value="Quantity"></InputLabel>
                    <TextInput id="quantity" type="number" class="mt-1 block w-full" v-model="form.quantity" required
                        autofocus autocomplete="quantity" />
                    <InputError class="mt-2" :message="form.errors.quantity" />
                </div>
            </div>
            <div class="mt-2">
                <InputLabel for="Images" value="Images"></InputLabel>
                <div class="flex gap-x-2">
                    <div v-for="(image, index) in ImagesViewLocal" :key="index">
                        <ImageBox :url="image.url" />
                    </div>
                    <input class="hidden" type="file" ref="fileInput" @change="ImagesUpload" multiple>
                    <UploadImageButton @click.prevent="handleButtonClick" />

                </div>
                <div class="text-xs text-red-500">
                    {{ ImagesError }}
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton v-if="mode==='newProduct'" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Add Product
                </PrimaryButton>
                <PrimaryButton v-if="mode==='editProduct'" class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Edit Product
                </PrimaryButton>
            </div>
        </form>
    </div>


</template>