import AllBuilding from './components/Building.vue';
import CreateProduct from './components/CreateBuilding.vue';
// import EditProduct from './components/EditProduct.vue';

export const routes = [
    {
        name: 'home',
        path: '/building',
        component: AllBuilding
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    // {
    //     name: 'edit',
    //     path: '/edit/:id',
    //     component: EditProduct
    // }
];
