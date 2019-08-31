<template>  
    <v-app id="inspire"> 
    <v-app-bar
      app
      clipped-right
      color=""
      
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" class='d-sm-flex d-md-none d-xs-flex'><v-icon>clear_all</v-icon></v-app-bar-nav-icon>
      <v-toolbar-title>Portifolio</v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="flex-grow-0">
        <v-btn text class='d-none d-md-flex'><router-link to='/' tag='span'><v-icon>account_balance</v-icon>Home</router-link></v-btn> 
      </div>
      <div class="flex-grow-0">
        <v-btn text class='d-none d-md-flex'><router-link to='/aboutme' tag='span'><v-icon>highlight</v-icon>AboutMe</router-link></v-btn>
      </div>
      <div class="flex-grow-0">
      <v-btn text class='d-none d-md-flex'><router-link to='/contactme' tag='span'><v-icon>call_end</v-icon>ContactMe</router-link></v-btn>
      </div>
      <div class="flex-grow-0">
      <v-btn text class='d-none d-md-flex' v-if="autheticated" @click="logout"><v-icon>exit_to_app</v-icon>Logout</v-btn> 
      </div>
      <div class="flex-grow-0">
      <v-btn v-if="!autheticated" text class='d-none d-md-flex'><router-link to='/login' tag='span'><v-icon>account_circle</v-icon>Login</router-link></v-btn>
      </div>
      <div class="flex-grow-0">
      <postDialog v-if="autheticated"/>
      </div>
    </v-app-bar>
    <v-navigation-drawer
      v-model="drawer"
      app
      temporary
    >
      <v-list dense>
         <v-list-item @click.stop="">
          <v-list-item-action>
            <v-icon>account_balance</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title><router-link to='/' tag='span'>Homepage</router-link></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click.stop="">
          <v-list-item-action>
            <v-icon>highlight</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title><router-link to='/aboutme' tag='span'>About</router-link></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click.stop="">
          <v-list-item-action>
            <v-icon>call_end</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title><router-link to='/contactme' tag='span'>ContactMe</router-link></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click.stop="" v-if="!autheticated">
          <v-list-item-action>
            <v-icon>account_circle</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title><router-link to='/login' tag='span'>Login</router-link></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item @click.stop="logout" v-if="autheticated">
          <v-list-item-action>
            <v-icon>exit_to_app</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title><router-link to='' tag='span'>Logout</router-link></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-content>
      <router-view></router-view>
    </v-content>
    <v-footer
      app
      color=""
      class="gray--text"
    >
      <span>Developed by Murtaza</span>
      <div class="flex-grow-1"></div>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>
<script>
import postDialog from './Utilities/postDialog';
export default {
  components:{
  postDialog
  },
   methods:{
      logout(){
      this.$store.dispatch('logout');
      }
    },
    computed:{
      autheticated(){
        return this.$store.state.autheticated;
      }
    },
      props: {
      source: String,
    },
    data: () => ({
      drawer: false,
      drawerRight: null,
      right: false,
      left: false,
    }),
}

</script>
