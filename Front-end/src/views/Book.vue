<script setup>
import {useBookingStore} from "@/stores/Book";
import {useGalleryStore} from "@/stores/Gallery";
import {useAuthStore} from "@/stores/Auth";
import {ref, watch} from 'vue';
// Use booking store to get booking
const bookingStore = useBookingStore();
const galleryStore = useGalleryStore();
const authStore = useAuthStore();
import {useRoute} from "vue-router";

let $route = useRoute();
const id = $route.params.id;
const movie = async (id) => {
  await galleryStore.getMovie(id)
  await bookingStore.getPlaces(id)
}
movie(id)


// watch(() => context.root.$route, () => {
//   console.log('route changed')
//   bookingStore.movieSelectedSeats = Array(50);
//   bookingStore.movieTotalSelected = 0;
//   bookingStore.movietotal = 0
// })

watch(
    $route,
    () => {
      console.log('route changed')
      bookingStore.movieSelectedSeats = [];
      bookingStore.movieTotalSelected = 0;
      bookingStore.movietotal = 0
      bookingStore.PlaceSelected = Array(50)
    },
    {deep: true, immediate: true,}
)



// onMounted(async (id) => {
//   await galleryStore.getMovie(id)
//   await bookingStore.getPlaces(id)
//   // await console.log(bookingStore.places)
//   // await console.log(galleryStore.galMovie)
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
              <div :id="i" v-if="bookingStore.isReserved(i)" class="seat occupied"></div>
              <div :id="i" v-else @click="bookingStore.selectSeat(i)" :class="'seat ' + bookingStore.selected[i]"></div>
            </div>
          </div>


          <p class="text">
            You have selected
            <span id="count">{{ bookingStore.totalSelected ? bookingStore.totalSelected : 0 }}</span> seats for the
            total price of <span id="total">{{ bookingStore.total ? bookingStore.total + ' Dh' : '0 Dh' }}</span>
          </p>
        </div>
      </div>


      <!-- Modal toggle -->
      <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Toggle modal
      </button>

      <!-- Main modal -->
      <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Static modal
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
              <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
              </p>
              <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
              </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
              <button data-modal-hide="staticModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
              <button data-modal-hide="staticModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
          </div>
        </div>
      </div>



      <div class="credits"><a href="http://www.aniket.co" target="_blank">Cinostalgia</a></div>
    </aside>
  </div>
</template>

