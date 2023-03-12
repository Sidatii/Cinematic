import { defineStore } from 'pinia'
import axios from 'axios'

export const useBookingStore = defineStore('booking', {
    state: () => ({
        bookings: null,
        booking: null,
    }),
    getters: {
        bookings: (state) => state.bookings,
        booking: (state) => state.booking,
    },
    actions: {
        async getBookings() {
            const response = await axios.post("Bookings/bookings");
            this.bookings = response.data
        },

    }
})
