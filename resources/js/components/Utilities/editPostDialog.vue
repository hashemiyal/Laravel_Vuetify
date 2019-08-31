<template>
	<v-row>
    <v-dialog v-model="dialog" persistent max-width="600px" class='mx-auto'>
      <template v-slot:activator="{ on }">
        <v-btn icon v-on="on"> 
        <v-icon>edit</v-icon>
      </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Edit This Article(:</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="12" md="12">
                <v-text-field label="Title" outlined required color='gray' v-model='updateabletitle'></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <v-textarea
          outlined
          name="description"
          label="Description"
          color='gray'
          v-model='updateabledescription'
        ></v-textarea>
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
              
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
              <v-date-picker
      v-model="updateabledate"
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
          <v-btn color="red darken-1" text @click="dialog = false">Cencel</v-btn>
          <v-btn color="green darken-1" text @click="update()">Update</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    
  </v-row>
</template>

<script>
export default {
  props:[
  'pid',
  'title',
  'description',
  'date'
  ],
  data () {
    return {
     dialog:false,
     updateabledate:this.date,
     updateabletitle:this.title,
     updateabledescription:this.description,
    }
  },
  computed:{
 
  },
  methods:{
  update(){
  this.dialog=false;
  this.$store.dispatch('update',{pid:this.pid,title:this.updateabletitle,description:this.updateabledescription,date:this.updateabledate});
  }
  }

}
</script>

<style lang="css" scoped>
</style>