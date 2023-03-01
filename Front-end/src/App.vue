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
  data() {
    return {
      user: null,
    };
  },
    async created() {
        const response = await axios.post("Users/getUser",
            {
              'token': localStorage.getItem('token')
            });

        this.user = response.data;
    },
};

</script>

<template>
  <navbar :user="user"/>
  <RouterView/>
  <RouterLink/>
<!--  <footer/>-->
</template>

