import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import Main from './components/Main'
import ContactMe from './components/ContactMe'
import AboutMe from './components/User/AboutMe';
import Login from './components/User/Login';
export default new VueRouter({
routes:[
{
path:'/',
component:Main
},
{
path:'/aboutme',
component:AboutMe
},
{
path:'/contactme',
component:ContactMe
},
{
path:'/login',
component:Login
}
]	
})