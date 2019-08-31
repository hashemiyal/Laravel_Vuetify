<template>
<v-container> 
   <v-card
   id='top'>
    <v-card
    flat
    > 
    <editDialog :uid="users['id']" :uname="users['name']" :uemail="users['email']" :uposition="users['position']" v-if="autheticated"/>      
      <v-img
        :src="this.users.coverUrl"   
         height='200'>
      </v-img>
    </v-card>
    <v-card-title primary-title>
       <v-avatar>
       <img
      :src="this.users.profileUrl"
        alt="Murtaza"
        class='grow'>
    </v-avatar>
     <h2 class="grow" v-text="users['name']"></h2>
    </v-card-title>
    <v-card-title primary-title>
    <v-avatar>
      <v-icon color=''>local_mall</v-icon>
    </v-avatar>
    <h4 v-text="users['position']"></h4>  
    </v-card-title>
    <v-divider></v-divider>
    <v-card-text class="py-10">
     <v-timeline>
    <v-timeline-item
      v-for="post in posts"
      :key="post.id"
      small
    >
      <template v-slot:opposite>
        <span
          class="headline font-weight-light"
          v-text=""
        >{{post.created_at|dateformat }}</span>
      </template>
      <div class="py-4">
        <h2 class="headline font-weight-light mb-4 " v-text='post.title'></h2>
        <div v-text='post.description' class="">
        </div>
        <v-divider></v-divider>
        <div class="py-0">
        <v-row justify="center" class='mx-auto' max-width='100'>
        <v-col cols="12" sm="6" md="6" xs='6'>
         <editPostDialog :pid="post.id" :title="post.title" :description="post.description" :date='post.created_at' v-if="autheticated"/>        
        </v-col>
        <v-col cols="12" sm="6" md="6" xs='6'>
        <deleteDialog :pid='post.id' v-if="autheticated"/>        
        </v-col>  
        </v-row>
        </div>
      </div>
    </v-timeline-item>
  </v-timeline>
    </v-card-text>
  </v-card>
</v-container>
</template>
<script>
import editDialog from './Utilities/editDialog';
import editPostDialog from './Utilities/editPostDialog'
import deleteDialog from './Utilities/deleteDialog'
export default {
  components:{
  editDialog,
  editPostDialog,
  deleteDialog
  },
  data: () => ({
      drawer: false,
      group: null,
  }),
    created(){
       window.axios.get('api/posts')
                            .then(response => {
                            this.$store.dispatch('loadPosts',response['data']);
                            })
                            .catch((error) => {
                               console.log(error);
                            });
                            window.axios.get('api/users')
                            .then(response => {
                            this.$store.dispatch('loadUsers',response['data']);
                            })
                            .catch((error) => {
                               console.log(error);
                            });          
    }
  ,
  watch: {
      group () {
        this.drawer = false
      },
    },
    computed:{
    posts(){
      return this.$store.getters.getPosts;
    },
    users(){
      return this.$store.getters.getUsers;
    },
    autheticated(){
      return this.$store.state.autheticated;
    }
    }
}
</script>
<style lang="css" scoped>
</style>