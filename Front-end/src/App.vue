<script>
import { RouterLink, RouterView } from 'vue-router'
import navbar from './components/navbar.vue'
// import HomeView from './views/HomeView.vue';
import Foooter from './components/footer.vue';
// import { FontAwesomeIcon, FontAwesomeLayers, FontAwesomeLayersText } from '@fortawesome/vue-fontawesome'


export default {
  name: "Cinostalgia",
  components: {
    navbar,
    RouterView,
    RouterLink,
    Foooter
  },
  data() {
    return {
      title: "",
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

