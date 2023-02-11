<script>
import { RouterLink, RouterView } from 'vue-router'
import navbar from './components/navbar.vue'
// import HomeView from './views/HomeView.vue';
import Foooter from './components/footer.vue';


export default {
  name: "sidat",
  components: {
    navbar,
    RouterView,
    RouterLink,
    Foooter
  },
  data() {
    return {
      title: "This is my first vue app",
    };
  },
};

</script>

<template>
<navbar />
<RouterView/>
<RouterLink/>
<Foooter/>
</template>

