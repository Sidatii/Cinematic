<script setup>
import {useBookingStore} from "@/stores/Book";
import {useGalleryStore} from "@/stores/Gallery";
import {ref} from 'vue';
// Use booking store to get booking
const bookingStore = useBookingStore();
const galleryStore = useGalleryStore();
import {onMounted} from "vue";
import {useRoute} from "vue-router";

// console.log($route.params.id)

// const id = ref($route.params.id)
let $route = useRoute();
const id = $route.params.id;

onMounted(async () => {
  await galleryStore.getMovie(id);
  console.log(galleryStore.movie)
})

console.log()

</script>

<template>
  <div
      class="sm:flex sm:flex-row flex-col">
    <main class=" flex-1 py-10  px-5 sm:px-10 ">
      <section>

        <div class="flex-col  gap-1">
          <!--  </div>-->
          <div
              class="flex flex-col justify-end mt-4 bg-black/10 bg-blend-multiply rounded-3xl h-80 overflow-hidden bg-cover bg-center px-7 pt-4 pb-6 text-white">

            <div class="bg-gradient-to-r from-black/30 to-transparent -mx-7 -mb-6 px-7 pb-6 pt-2">
            <span class="uppercase text-3xl font-semibold drop-shadow-lg ">
            </span>
              <div class="flex sm:flex-row flex-col w-fit gap-4 sm:text-md text-sm text-white mt-2 bold">
                <div class="rounded-3xl border border-transparent bg-[#FCC252] px-2 py-1">Released: {{$route.params.id}}
                </div>
                <div class="rounded-3xl border border-transparent bg-[#FCC252]  px-2 py-1">ON:
                </div>
                <div class="rounded-3xl border border-transparent bg-[#FCC252]  px-2 py-1">AT:
                </div>
              </div>
              <button class="mt-4 flex space-x-3 items-center">
                <a class="px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-md bold inline-block">BOOK NOW</a>
              </button>
            </div>
          </div>
        </div>
      </section>


    </main>
    <aside class="w-fit sm:w-2/5 py-10 px-10 min-w-min border-l border-gray-300">
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

          <div class="row">
            <div  class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
          </div>
          <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat occupied"></div>
            <div class="seat"></div>
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

