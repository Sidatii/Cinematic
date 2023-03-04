<template>
  <!--  <div v-if="user">-->
  <navbar :user="user" :key="user"/>
  <RouterView/>
  <!--  </div>-->
<!--    <RouterLink/>-->

  <!--  <footer/>-->
</template>


<script>
import {RouterLink, RouterView} from 'vue-router'
import navbar from './components/navbar.vue'
// import footer from './components/footer.vue';
import axios from "axios";


export default {
  name: "Cinostalgia",

  components: {
    navbar,
    RouterLink,
    RouterView,
    // footer
  },
  methods: {
    // parseJwt(token) {
    //   var base64Url = token.split('.')[1];
    //   var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    //   var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function (c) {
    //     return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    //   }).join(''));
    //
    //   console.log(JSON.parse(jsonPayload));
    // },
    async isLoged() {
      if (localStorage.getItem('token')) {
        this.isLogged = true;
      } else {
        this.isLogged = false;
        this.user = []
      }
    }
  },
  data() {
    return {
      user: null,
      isLogged: false,
    };
  },
  beforeRouteUpdate(to, from, next) {
    this.$nextTick(() => {
      // Appel à la méthode qui charge les composants
      this.loadComponents().then(() => {
        next();
      });
    });
  },
  watch: {
    $route(to, from) {
      this.isLoged();
    },

  },

  async beforeCreate() {


  },
  async created() {
    const response = await axios.post("Users/getUser",
        {
          'token': localStorage.getItem('token')
        });
    this.user = response.data
    console.log('something')
    // this.parseJwt('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoidmpoaHZqaHNkaGhoaHZ2ZHN2IiwibGFzdE5hbWUiOiJoamJzcXZzaGR2amJjaiIsImVtYWlsIjoiaGpic2NzQGpidmRzYnFqanMudm9tIn1d.9Qpkzd12IlIESXtf7WgTTP0e85Xc7xhuldPU8Dape-A')
  }

};

</script>



