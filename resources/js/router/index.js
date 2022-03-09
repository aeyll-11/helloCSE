import { createRouter, createWebHistory } from "vue-router";

import StarsIndex from '../components/stars/StarsIndex.vue';
import StarsCreate from '../components/stars/StarsCreate.vue';
import StarsEdit from '../components/stars/StarsEdit.vue';
import Stars from '../components/stars/Stars.vue';
const routes = [
    {
        path: '/dashboard',
        name: 'stars.index',
        component: StarsIndex
    },
    {
        path: '/stars/create',
        name: 'stars.create',
        component: StarsCreate
    },
    {
        path: '/stars/:id',
        name: 'stars.edit',
        component: StarsEdit,
        props: true
    },
    {
        path: '/stars',
        name: 'stars.display',
        component: Stars,
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
});
