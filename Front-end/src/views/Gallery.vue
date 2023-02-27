<template>
  <div class="gallery">
    <h1>This is a gallery page</h1>
  </div>
</template>

<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';

export default {
    name: 'gallery',
    Data(){
        return {
            movies: []
        };
    },
    methods: {
    }
}


</script>