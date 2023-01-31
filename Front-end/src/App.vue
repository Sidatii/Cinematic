<script>
import { RouterLink, RouterView } from 'vue-router'
import navbar from './components/navbar.vue'

export default {
  name: "sidat",
  components: {
    navbar
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
  
</template>

