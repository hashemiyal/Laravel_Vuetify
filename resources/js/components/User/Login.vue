<template>
<v-container>
  <v-card id='top'>
        <v-card-title>
          <span class="headline">Login As Admin</span>
        </v-card-title>
        <v-card-text>
          <v-container> 
            <v-row>
              <v-col cols="12" sm="12" md="12">
              <v-text-field label="username" outlined required color='gray' v-model='username'></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                 <v-text-field
                 v-model="password"
                 :append-icon="show1 ? 'visibility' : 'visibility_off'"
                 :rules="[rules.required, rules.min]"
                 :type="show1 ? 'text' : 'password'"
                 name="password"
                 label="Passwrod"
                 outlined
                 counter
                 @click:append="show1 = !show1"
                 ></v-text-field>
              </v-col>
              </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
        	<v-spacer></v-spacer>
          <v-btn color="green darken-1"  @click="Login()"><v-icon left>arrow_forward</v-icon>Login</v-btn>
        </v-card-actions>
      </v-card>
</v-container>
</template>
<script>
export default {
  data () {
    return {
    username:'',
    password:'',
     show1: false,
     
      rules: {
          required: value => !!value || 'Required.',
          min: v => v.length >= 8 || 'Min 8 characters',
        },
    }
  },
  methods:{
  	Login(){
    this.$store.dispatch('login',{email:this.username,password:this.password});
  	}
  }
}
</script>
<style lang="css" scoped>
#top {
margin-top:80px !important;
}
</style>