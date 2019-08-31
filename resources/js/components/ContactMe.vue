<template>
<v-container>
    <v-card id='top'>
        <v-card-title>
          <span class="headline">Contact Me</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="Your Name" outlined required color='gray' v-model="name"></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="Your E-Mail" outlined required color='gray' v-model="email"></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <v-textarea
          outlined
          name="message"
          label="Message"
          color='gray'
          v-model="message"
        ></v-textarea>
              </v-col>
              </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
      <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="sendmail">Send</v-btn>
        </v-card-actions>
      </v-card>
  </v-container>
</template>

<script>
export default {

  data () {
    return {
      name:'',
     email:'',
     message:''
    }
  },
  methods:{
    sendmail(){
      this.$store.dispatch('sendmail',{message:this.message});
    }
  }
}
</script>

<style lang="css" scoped>
#top{
margin-top:80px !important;
}
</style>