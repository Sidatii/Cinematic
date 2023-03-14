<script setup>
import {useBookingStore} from "@/stores/Book";
import {useAuthStore} from "@/stores/Auth";
import {ref, watch} from 'vue';
import {useRoute} from "vue-router";
import Ticket from "@/components/Ticket.vue";

let $route = useRoute();




const bookingStore = useBookingStore();
const authStore = useAuthStore();
const user_id = authStore.user.ID

const ticket = (user_id) => {
  bookingStore.getBookings(user_id)
}

ticket(user_id)

</script>

<template>
  <Ticket v-for="ticket in bookingStore.moviesBooking"/>
</template>