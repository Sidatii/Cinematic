<script setup>
import {useBookingStore} from "@/stores/Book";
import {useAuthStore} from "@/stores/Auth";
import {onBeforeMount, onMounted, watch} from 'vue';
import {useRoute} from "vue-router";

let $route = useRoute();

const bookingStore = useBookingStore();
const authStore = useAuthStore();

// const  ticket = async (user_id) => {
//   await bookingStore.getBookings(user_id)
// }
// if (authStore.user.ID) {
//   ticket(user_id)
// }else {
//   console.log('no user')

// }

onMounted(async () => {
  await authStore.getTickets(localStorage.getItem('ID'))
})

// watch(
//     $route,
//     () => {
//       ticket(user_id)
//     },
//     {deep: true, immediate: true,}
// )

</script>

<template>
  <div v-for="ticket in authStore.tickets" class="flex flex-col sm:flex-row bg-white rounded shadow p-8 max-w-2xl mx-auto w-fit p-8 m-5 gap-4 text-center">
    <div class="rounded-lg flex flex-col items-center justify-center gap-4 text-center">
      <button class="bg-[#FCC252] hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" @click="bookingStore.cancel(ticket.ID)">Delete</button>
    </div>
    <div class="rounded-lg flex flex-col items-center gap-4 text-center">
      <img src="src/assets/CinNostalgia_logo.svg" class="w-16 flex justify-center">
      <p class="text-sm -bold ">Cinostalgia Ticket [{{ticket.ID}}]</p>
    </div>
    <div class="rounded-lg flex flex-col items-center gap-4">
      <p class="mb-1 leading-5 text-gray-800 font-bold text-xl text-center">{{ ticket.movie }}</p>
      <span class="mb-1 leading-5 text-gray-800 dark:text-gray-100 font-bold text-lg" >Place no: {{ticket.place}}</span>
    </div>
    <div class="rounded-lg flex flex-col items-center gap-4">
      <p class="font-normal text-md text-right leading-4 text-green-400 tracking-normal text-center">{{ ticket.broadcast_time }}</p>
      <p class="font-normal text-md text-right leading-4 text-green-400 tracking-normal">{{ ticket.broadcast_date }}</p>
      <p class="font-normal text-md leading-4 text-green-400 tracking-normal">{{ ticket.room }}</p>
    </div>
    <div class="rounded-lg flex flex-col gap-4 text-center justify-center">
      <p class="font-normal text-md leading-4 text-yellow-300 text-center tracking-normal">For: {{ authStore.user.firstName }} {{ authStore.user.lastName }}</p>
      <p class="font-normal text-md text-right leading-4 text-yellow-300 text-center tracking-normal">Booked: {{ ticket.booked_at }}</p>
    </div>
  </div>

</template>