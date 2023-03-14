<script setup>
import {useBookingStore} from "@/stores/Book";
import {useGalleryStore} from "@/stores/Gallery";
import {useAuthStore} from "@/stores/Auth";
import {onMounted, ref, watch} from 'vue';
import {initModals} from 'flowbite'


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


onMounted(() => {
  initModals();
})


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


      <button v-if="authStore.authUser !== null" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
              class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
              type="button">
        Toggle modal
      </button>
      <p v-else class="text-red-500">You must be logged in to book a seat</p>

      <div id="popup-modal" tabindex="-1"
           class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
          <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="popup-modal">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                   xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
              <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none" stroke="currentColor"
                   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to book this movie?</h3>
              <button data-modal-hide="popup-modal" @click="bookingStore.bookSeats(id, authStore.user.ID)" type="button"
                      class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                Yes, I'm sure
              </button>
              <button data-modal-hide="popup-modal" type="button"
                      class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">
                No, cancel
              </button>
            </div>
          </div>
        </div>
      </div>


      <div class="credits"><a href="http://www.aniket.co" target="_blank">Cinostalgia</a></div>
    </aside>
  </div>
</template>

