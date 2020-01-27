import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
// vue.use(VueAxios, axios)

Vue.component('autocomplete',require('./autocomplete/autocomplete.vue').default);
const app=new Vue({
    el:'#app',
});
// import App from './views/App'
// import Hello from './views/Hello'
// import Home from './views/Home'
// import UsersIndex from "./views/UsersIndex";
//
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/',
//             name: 'home',
//             component: Home
//         },
//         {
//             path: '/hello',
//             name: 'hello',
//             component: Hello,
//         },
//         {
//             path:'/users',
//             name:'users.index',
//             component:UsersIndex,
//         },
//     ],
// });
//
// const app = new Vue({
//     el: '#app',
//     name:App,
//     components: { App },
//     router,
// });
