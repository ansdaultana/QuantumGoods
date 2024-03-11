<script setup>
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import ImageBox from '@/Components/Product/ImageBox.vue';
import UploadImageButton from '@/Components/Product/UploadImageButton.vue';
import { computed, ref } from 'vue';

const page = usePage()

const banks = computed(() => page.props.banks);

const form = useForm({
    company_name: '',
    address: '',
    phone_number: '',
    facebook_store_url: '',
    instagram_store_url: '',
    bank_account_number: '',
    bank_name: '',
    details: '',
    terms: false,
    image: null,

});
const acceptedImageTypes = ['image/jpeg', 'image/png'];
const ImageViewLocal = ref(null);
const ImageError = ref('');
const fileInput = ref(null);
const submit = () => {
    form.post('/vendor/register', {
        onFinish: () => form.reset(),
    });
};

const handleButtonClick = () => {
    fileInput.value.click();
};

const ImagesUpload = () => {
    const file = fileInput.value.files[0];
    if (acceptedImageTypes.includes(file.type)) {

        const imageUrl = URL.createObjectURL(file);

        ImageViewLocal.value = { url: imageUrl };

        form.image = file;
    } else {
        ImageError.value = 'Image is not in Jpeg or Png format.';
    }
};

const RemoveImage = () => {
    ImageViewLocal.value = null
    form.image = null
}
</script>

<template>

    <Head title="Register" />

    <GuestLayout mode="vendor">
        <form @submit.prevent="submit">
            <div class="flex gap-x-5">

                <div>
                    <InputLabel for="Company Name" value="Company Name" />

                    <TextInput id="company_name" type="text" class=" block w-full" v-model="form.company_name" required
                        autofocus autocomplete="company_name" />

                    <InputError class="" :message="form.errors.company_name" />
                </div>

                <div>
                    <InputLabel for="Phone Number" value="Phone Number" />
                    <TextInput id="phone_number" type="text" class="mt-1 block w-full" v-model="form.phone_number"
                        required autofocus autocomplete="phone_number" />

                    <InputError class="mt-2" :message="form.errors.phone_number" />

                </div>
            </div>

            <div class="mt-2">
                <InputLabel for="Address" value="Address" />

                <TextArea id="address" type="text" class="mt-1 block w-full" v-model="form.address" required
                    autocomplete="address" />

                <InputError class="mt-2" :message="form.errors.address" />
            </div>

            <div class="mt-2 ">

                <div>
                    <InputLabel for="Bank Name" value="Bank Name" />

                    <select id="bank_name" class="mt-1 block w-full rounded-xl" v-model="form.bank_name" required
                        autocomplete="bank_name">
                        <option value="" disabled selected>Select Bank</option>
                        <option class=" border-dotted border-b-2 " v-for="bank in banks" :key="bank.id"
                            :value="bank.name">{{ bank.name }}</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.bank_name" />

                </div>
                <div>
                    <InputLabel for="Acoount Number" value="Account Number" />

                    <TextInput id="bank_account_number" type="text" class="mt-1 block w-full"
                        v-model="form.bank_account_number" required autocomplete="bank_account_number" />

                    <InputError class="mt-2" :message="form.errors.bank_account_number" />
                </div>
            </div>
            <div class="mt-2 flex gap-x-5">

                <div>
                    <InputLabel for="Facebook Url" value="Facebook Url" />

                    <TextInput id="facebook_store_url" type="url" class="mt-1 block w-full"
                        v-model="form.facebook_store_url" autocomplete="facebook_store_url" />

                    <InputError class="mt-2" :message="form.errors.facebook_store_url" />

                </div>
                <div>
                    <InputLabel for="Instagram Url" value="Instagram Url" />

                    <TextInput id="instagram_store_url" type="url" class="mt-1 block w-full"
                        v-model="form.instagram_store_url" autocomplete="instagram_store_url" />

                    <InputError class="mt-2" :message="form.errors.instagram_store_url" />
                </div>
            </div>

            <div class="mt-2 flex">

                <div>
                    <InputLabel for="Details" value="Tell us about your products" />

                    <TextArea id="details" type="text" class="mt-1 block w-full" v-model="form.details" required
                        autocomplete="details" />

                    <InputError class="mt-2" :message="form.errors.details" />
                </div>
                <div class="flex items-center justify-center gap-x-2 p-2 m-2">
                    <input class="hidden" type="file" ref="fileInput" @change="ImagesUpload">

                    <ImageBox v-if="form.image" :size="'md'" :url="ImageViewLocal.url" @deleteImage="RemoveImage" />
                    <UploadImageButton :size="'md'" @click.prevent="handleButtonClick" />
                </div>
            </div>
            <div class="flex items-center justify-end mt-2">

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>


</template>
