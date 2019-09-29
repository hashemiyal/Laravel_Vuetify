import Vue from 'vue'
import Vuex from 'vuex'
import router from './router'
Vue.use(Vuex)
export default new Vuex.Store({
  state: {
  autheticated:localStorage.getItem('autheticated'),
  posts:[],
  users:{},
  credintial:true
  },

  actions: {
  loadPosts({commit},payload){
  this.state.posts=payload;
  },

  loadUsers({commit},payload){
  this.state.users=payload;
  },

  login: function ({commit},payload){
  window.axios.post('api/user', payload).then(response => {
  if (response['data']=='credential does not match') {
   return this.state.credintial=false;
  }else{
  localStorage.setItem('autheticated',true);
  this.state.autheticated=true;
  router.push('/');  
  }
  
  }).catch((error) => {
      console.log(error);
  });
  },

  logout(){
  console.log('logged out');
  localStorage.removeItem('autheticated')
  this.state.autheticated=false;
  this.state.credintial=true;
  },

  save:function({commit},payload){
    window.axios.post('api/posts', payload).then(response => {
    console.log(response['data']);
    this.state.posts=response['data'];
  }).catch((error) => {
     console.log(error);
  });
  },

  update({commit},payload){
    window.axios.patch('api/posts/'+payload.pid,payload).then(response => {
    console.log(response['data']);
    this.state.posts=response['data'];
  }).catch((error) => {
     console.log(error);
  });
  },

  deletepost({commit},payload){
    window.axios.delete('api/posts/'+payload).then(response => {
    console.log(response['data']);
    this.state.posts=response['data'];
  }).catch((error) => {
     console.log(error);
  });
  },

  editprofile({commit},payload){
    const config={header:{'Content-Type':'multipart/form-data'}};
    window.axios.patch('api/users/'+payload.uid,payload,).then(response => {
    console.log(response['data']);
    this.state.users=response['data'];
  }).catch((error) => {
     console.log(error);
  });
  },

  sendmail({commit},payload){
    console.log('email has been sent');
  }
  },

  getters:{
   getPosts(state){
   return state.posts;
  },
  getUsers(state){
  return state.users;
  }
  }
});