<script setup>
import {useGalleryStore} from "@/stores/Gallery";
import {onMounted} from "vue";
import {ref} from 'vue';
const galleryStore = useGalleryStore();


const date = ref('')

onMounted(async () => {
  await galleryStore.getMovies();
})


</script>


<template>

  <div
      class="flex min-h-screen  2xl:max-w-screen-2xl 2xl:mx-auto 2xl:border-x-2 2xl:border-gray-200 dark:2xl:border-zinc-700 ">

    <main class=" flex-1 py-10  px-5 sm:px-10 ">
      <div class="flex justify-center items-center">
        <input @change="galleryStore.filterMovies(date)" v-model="date" type="date"
               class="text-xs ring-1 bg-transparent ring-gray-200 focus:ring-red-300 pl-10 pr-5 text-gray-600 dark:text-white  py-3 rounded-full w-fit outline-none focus:ring-1"
               placeholder="Search ...">
      </div>

      <header class=" font-bold text-lg flex items-center  gap-x-3 md:hidden mb-12 ">

        <div class="relative items-center content-center flex ml-2 sm:justify-between justify-center">
                    <span class="text-gray-400 absolute left-4 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
          <input type="text"
                 class="text-xs ring-1 bg-transparent ring-gray-200 focus:ring-red-300 pl-10 pr-5 text-gray-600 dark:text-white  py-3 rounded-full w-full outline-none focus:ring-1"
                 placeholder="Search ...">
        </div>
      </header>

      <section>
        <nav class="flex space-x-6 text-gray-400 font-medium">
          <a href="#" class="hover:text-gray-700 dark:hover:text-white">TV Series</a>
          <a href="#" class="text-gray-700 dark:text-white font-semibold">Movies</a>
          <a href="#" class="hover:text-gray-700 dark:hover:text-white ">Animes</a>
        </nav>


        <div v-if="galleryStore.movies.length> 0">
          <div class="flex-col gap-1" v-for="movie in galleryStore.movies">
            <!--  </div>-->
            <div
                class="flex flex-col justify-end mt-4 bg-black/10 bg-blend-multiply rounded-3xl h-80 overflow-hidden bg-cover bg-center px-7 pt-4 pb-6 text-white"
                :style="{ 'background-image': 'url(../src/assets/' + movie.image + ')'}">
              <div class="bg-gradient-to-r from-black/30 to-transparent -mx-7 -mb-6 px-7 pb-6 pt-2">
                <span class="uppercase text-3xl font-semibold drop-shadow-lg ">{{ movie.name }}</span>
                <div class="flex sm:flex-row flex-col w-fit gap-4 sm:text-md text-sm text-white mt-2 bold">
                  <div class="rounded-3xl border border-transparent bg-[#FCC252] px-2 py-1">Released:
                    {{ movie.release_date }}
                  </div>
                  <div class="rounded-3xl border border-transparent bg-[#FCC252]  px-2 py-1">ON: {{
                      movie.broadcast_date
                    }}
                  </div>
                  <div class="rounded-3xl border border-transparent bg-[#FCC252]  px-2 py-1">AT: {{
                      movie.broadcast_time
                    }}
                  </div>
                </div>
                <button class="mt-4 flex space-x-3 items-center">
                  <router-link :to="{ path: '/book/' + movie.ID }"
                               class="px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-md bold inline-block">BOOK
                    NOW
                  </router-link>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div v-else class="-align-center flex justify-center items-center font-bold">
          <p>No movies found</p>
        </div>
      </section>
    </main>


  </div>

</template>

