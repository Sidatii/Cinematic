<script>
import { RouterLink, RouterView } from 'vue-router'
import navbar from './components/navbar.vue'
import Footer from './components/footer.vue';


export default {
  name: "Cinostalgia",
  components: {
    navbar,
    RouterView,
    RouterLink,
    Footer
  },
  data() {
    return {
      title: "",
    };
  },
};

</script>

<template>
<navbar/>
<RouterView/>
<RouterLink/>
<Footer/>
</template>

