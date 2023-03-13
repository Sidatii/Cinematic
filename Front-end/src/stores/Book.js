import { defineStore } from 'pinia'
import axios from 'axios'

export const useBookingStore = defineStore('booking', {
    state: () => ({
        moviesBooking: null,
        movieBooking: null,
    }),
    getters: {
        bookings: (state) => state.moviesBooking,
        booking: (state) => state.movieBooking,
    },
    actions: {
        async getBookings() {
            const response = await axios.post("Bookings/bookings");
            this.moviesBooking = response.data
        },

    }
})
