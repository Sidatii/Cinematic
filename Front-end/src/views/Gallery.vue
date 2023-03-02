<template>
  <div class="flex gap-1" v-for="movie in movies">
        <img class="rounded-3xl shadow-lg max-w-[200px]" src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1LRLLWGvs5sZdTzuMqLEahb88Pc.jpg" alt="">
  </div>
  <div>
    <h2>
      Sidatii
    </h2>
  </div>
</template>

<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';

export default {
    name: 'gallery',
    Data(){
        return {
            movies: {}
        };
    },
    methods: {
    },
    async beforeMount() {
        const response = await axios.get('Movies/getMovies');
        this.movies = response.data;
    }
}


</script>