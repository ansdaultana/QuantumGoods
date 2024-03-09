import { router } from '@inertiajs/vue3';

const gotoSignIn = ()=>
{
    router.get('/login')
}
const gotoVendorRegister =()=>
{
    router.get('/vendor/registerPage')
}

const gotoMyShop =()=>
{
    router.get('/vendor/dashboard');
}
const gotoHome=()=>{
    router.get('/');
}
const gotoNewProduct=()=>{
    router.get('/vendor/dashboard/newproduct');
}
const gotoVendorProducts=()=>{
    router.get('/vendor/dashboard/products');
}

export { gotoSignIn, gotoVendorRegister, gotoMyShop,gotoHome,gotoNewProduct,gotoVendorProducts };