import Vue from 'vue'
import VueRouter from 'vue-router'

// Layouts
import commandeLayout from './layout/commande.vue'

// Commandes
import CommandeIndex from './views/commande/index.vue'
import CommandeDetails from './views/commande/show.vue'



// others
import NotFoundPage from './views/errors/error404.vue'


Vue.use(VueRouter)

const routes = [
    {
        path: '/clients',
        component: commandeLayout,
        children: [
            {path: '', component: CommandeIndex, name: 'commande_index'},
            {path: ':id', component: CommandeDetails, name: 'commande_detail'}
        ],
    },
    //  DEFAULT ROUTE
    {path: '', component: NotFoundPage}
];

const router = new VueRouter({
    routes,
    linkActiveClass: 'active'
})

export default router
