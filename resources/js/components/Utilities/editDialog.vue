<template>
 <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on }">
        <v-btn fab v-on="on"
        absolute
        bottom
        right
        small
        ><v-icon>edit</v-icon></v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Edit Profile</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="New Name" required color='gray' v-model='username'></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="New Position" color='gray' v-model='userposition'></v-text-field>
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
                <v-text-field label="New Email" color='gray' v-model='useremail'></v-text-field>
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
              <v-file-input
              label="New ProfilePhoto"
              filled
              accept="image/*"
              color='gray'
              v-model='profilephoto'
              @change="onprofileSelected"
              prepend-icon="add_a_photo"
              ></v-file-input>
              </v-col>
              <v-divider></v-divider>
              <v-col cols="12" sm="12" md="12">
              <v-file-input
              label="New CoverPhoto"
              accept="image/*"
              color='gray'
              filled
              v-model='coverphoto'
              @change="oncoverSelected"
              prepend-icon="add_a_photo"
  ></v-file-input>
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
      {{this.username}}
    </v-dialog>
  </v-row>

</template>

<script>
export default {
  props:['uid','uname','uemail','uposition'],
  data () {
    return {
     form:new FormData,
     username:'',
     useremail:'',
     userposition:'',
     dialog:false,
     profilephoto:null,
     profileUrl:null,
     coverphoto:null,
     coverUrl:null,
     form:new FormData
    }
  },
  methods:{
    onprofileSelected(e){
    let reader = new FileReader()
      reader.onload = () => {
        this.profileUrl = reader.result
      }
      reader.readAsDataURL(this.profilephoto)
      
    },
    oncoverSelected(e){
    let reader = new FileReader()
      reader.onload = () => {
        this.coverUrl = reader.result
      }
      reader.readAsDataURL(this.coverphoto)
    },
    save(){
      this.dialog=false;
      const config={header:{'Content-Type':'multipart/form-data'}};
      this.form.append('profile',this.profilephoto);
      this.form.append('cover',this.coverphoto);
      this.$store.dispatch('editprofile',{uid:this.uid,name:this.username,position:this.userposition,email:this.useremail,images:this.form});
       window.axios.post('api/users',this.form,config).then(response => {
       console.log(response['data']);
      this.$store.state.users=response['data'];
      }).catch((error) => {
       console.log(error);
  });
    }
  },
  
}
  
</script>

<style lang="css" scoped>
</style>