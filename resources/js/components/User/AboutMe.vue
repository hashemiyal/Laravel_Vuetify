<template>
  <v-container>
  <v-card
    class="mx-auto"
    max-width="900"
    id="top">
    <v-card-title class="">
      <span class="title">Biography</span>
      <v-spacer></v-spacer>
    </v-card-title>
    <v-card-text class="py-0">
      <v-timeline dense>
         <v-timeline-item   
            small
            fill-dot>
            <v-alert
            icon="highlight" 
            >
            Hi There!
            I am  MURTAZA I was born in  KABUL AFGHANISTAN 1996
            graduated from kabul University computer science faculty department of software engineering
            finished my high school from Abdul Rahim shaheed high school
         </v-alert>
      </v-timeline-item> 
      </v-timeline>
    </v-card-text>
  </v-card>
  <v-divider max-width="900"></v-divider>
  <v-card
    class="mx-auto"
    max-width="900"
    id="bottom"
  >
    <v-card-title>
      <span class="title">Address</span>
      <v-spacer></v-spacer>
    </v-card-title>
    <v-card-text class="py-0">
      <v-timeline dense>
          <v-timeline-item
            small
            fill-dot>
            <v-alert  
              icon="edit_location">
House No / 74   ........ Street NO / 13<sup>the</sup>  district
Town / City  ......   Kabul / Dashte -e- Barchi
County   ......   Afghanistan
Postcode / ....  1006
Phone No /   ....  0093744536915
Facebook /  .... <a href="https://www.facebook.com/developer.yal">https://www.facebook.com/developer.yal</a>
instagram / .......   <a href="https://www.instagram.com/murtazahashemi_yal/?hl=en">https://www.instagram.com/murtazahashemi_yal/?hl=en</a>
twitter /.......<a href="https://twitter.com/mhashemiyal">https://twitter.com/mhashemiyal</a>
linkin / ........  <a href="https://af.linkedin.com/in/murtaza-hashemi-yal-a24234144?trk=people-guest_profile-result-card_result-card_full-click">https://af.linkedin.com/in/murtaza-hashemi-yal-a24234144?trk=people-guest_profile-result-card_result-card_full-click</a>
            </v-alert>
          </v-timeline-item>
      </v-timeline>
    </v-card-text>
  </v-card>  
  </v-container>
</template>
<script>
export default {
  name: 'AboutMe',
   data () {
    return {
     interval: null,
    }
  },
   
}
</script>
<style lang="css" scoped>
#top{
 margin-top:100px !important;
}
</style>