<template>
    <v-dialog v-model="dialog" max-width='600' class='mx-auto'>
      <template v-slot:activator="{ on }">
        <v-btn text v-on="on" class=''> 
        <v-icon>add</v-icon>Post
      </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Write an Article (:</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="12" md="12">
                <v-text-field label="Title" outlined required color='gray' v-model='title'></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <v-textarea
          outlined
          name="description"
          label="Description"
          color='gray'
          v-model='description'
        ></v-textarea>
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
              
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
              <v-date-picker
      v-model="date"
      full-width
      :landscape="$vuetify.breakpoint.smAndUp"
      class="mt-4"
      color="black"
    ></v-date-picker>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="red darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="green darken-1" text @click="save()">Save</v-btn>
        </v-card-actions>
      </v-card>
      {{this.date}}
    </v-dialog>
 

</template>

<script>
export default {

  data () {
    return {
    dialog:false,
     date: new Date().toISOString().substr(0, 10),
     title:'',
     description:'',
    }
  },
  methods:{
    save(){
      this.dialog=false;
      this.$store.dispatch('save',{title:this.title,description:this.description,date:this.date});
      
    }
  }
}
</script>

<style lang="css" scoped>
</style>