<script setup>
import {useBookingStore} from "@/stores/Book";
import {useGalleryStore} from "@/stores/Gallery";
import {ref, watch} from 'vue';
// Use booking store to get booking
const bookingStore = useBookingStore();
const galleryStore = useGalleryStore();
import {onMounted} from "vue";
import {useRoute} from "vue-router";
import router from "@/router";
import axios from "axios";

// console.log($route.params.id)

// const id = ref($route.params.id)
let $route = useRoute();
// watch(
//     () => $route.params.id,
//     (id) => {
//         console.log(id)
//         galleryStore.getMovie(id)
//     }
// )
const id = $route.params.id;
const movie = async (id) => {
  await galleryStore.getMovie(id)
  await console.log(galleryStore.galMovie)
}
movie(id)

// onMounted(async (id) => {
//   await this.movie(id)
//   console.log(galleryStore.movie)
// })


</script>

<template>
  <div
      class="sm:flex sm:flex-row flex-col justify-center">

    <div class="w-full sm:w-1/2 py-10 px-10 min-w-min border-l border-gray-300">
      <img :src="'/src/assets/' + galleryStore.movie.cover" class="h-96 aspect-auto">
      <div class="flex sm:flex-row flex-col w-fit gap-4 sm:text-md text-sm text-white mt-2 bold">
        <div class="rounded-3xl border border-transparent bg-[#FCC252] px-2 py-1">Released:
          {{ galleryStore.movie.release_date }}
        </div>
        <div class="rounded-3xl border border-transparent bg-[#FCC252]  px-2 py-1">ON:
          {{ galleryStore.movie.broadcast_date }}
        </div>
        <div class="rounded-3xl border border-transparent bg-[#FCC252]  px-2 py-1">AT:
          {{ galleryStore.movie.time }}
        </div>
      </div>
    </div>
    <aside class="w-fit sm:w-1/2 py-10 px-10 min-w-min border-l border-gray-300">
      <div class="movie-container">
        <ul class="showcase">
          <li>
            <div class="seat"></div>
            <small>N/A</small>
          </li>
          <li>
            <div class="seat selected"></div>
            <small>Selected</small>
          </li>
          <li>
            <div class="seat occupied"></div>
            <small>Occupied</small>
          </li>
        </ul>

        <div class="container">
          <div class="screen"></div>
          <div class="grid grid-cols-10 place-items-center sm:grid-cols-2 md:grid-cols-10">
            <div v-for="i in 50" class="">
              <div :id="i" class="seat">
              </div>
            </div>
          </div>


          <p class="text">
            You have selected <span id="count">0</span> seats for the total price of Rs. <span id="total">0</span>
          </p>
        </div>
      </div>

      <div class="credits"><a href="http://www.aniket.co" target="_blank">Cinostalgia</a></div>
    </aside>
  </div>
</template>

