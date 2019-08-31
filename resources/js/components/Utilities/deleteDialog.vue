<template>
	<v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on }">
     <v-btn icon v-on="on"> 
        <v-icon>delete_sweep</v-icon>
      </v-btn>
      </template>
      <v-card>
        <v-card-title>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="12" md="6">
                <span>Are You Sure?</span>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          
          <v-btn color="red darken-1" text @click="dialog = false">NO</v-btn>
          <v-btn color="green darken-1" text @click="deletepost()">Yes</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>

</template>

<script>
export default {

props:[
'pid'
],

  data () {
    return {
     dialog:false
    }
  },
  methods:{
    deletepost:function(){
      this.dialog=false;
      this.$store.dispatch('deletepost',this.pid);
    }
  }
}
</script>

<style lang="css" scoped>
</style>