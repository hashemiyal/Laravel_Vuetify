
require('./bootstrap');
import Home from './components/Home.vue'
import router from './router'
import store from './store'

window.Vuetify = require('vuetify');
Vue.use(Vuetify)
Vue.filter('dateformat',d=>{
 var y=d.slice(0,4);
 var m=d.slice(5,7);
 var d=d.slice(8,10);
 switch(m){
 case '01':
 return 'Jan '+d+", "+y;
 break;
 case '02':
 return 'Feb '+d+", "+y;
 break;
 case '03':
 return 'Mar '+d+", "+y;
 break;
 case '04':
 return 'Apr '+d+", "+y;
 break;
 case '05':
 return 'May '+d+", "+y;
 break;
 case '06':
 return 'Jun '+d+", "+y;
 break;
 case '07':
 return 'Jul '+d+", "+y;
 break;
 case '08':
 return 'Aug '+d+", "+y;
 break;
 case '09':
 return 'Sep '+d+", "+y;
 break;
 case '10':
 return 'Oct '+d+", "+y;
 break;
 case '11':
 return 'Nev '+", "+d+y;
 break;
case '12':
 return 'Dec '+", "+ d +y.slice(2);
 break;
 }
});
const app = new Vue({
  el: '#app',
  router:router,
  store,
  vuetify : new Vuetify(),
  render:(h)=>h(Home)  
});
