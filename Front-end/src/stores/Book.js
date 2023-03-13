import { defineStore } from 'pinia'
import axios from 'axios'

export const useBookingStore = defineStore('booking', {
    state: () => ({
        moviesBooking: null,
        movieBooking: null,
        moviePlaces: null,
    }),
    getters: {
        bookings: (state) => state.moviesBooking,
        booking: (state) => state.movieBooking,
        places: (state) => state.moviePlaces,
    },
    actions: {
        async getBookings() {
            const response = await axios.post("Bookings/bookings");
            this.moviesBooking = response.data
        },
        async getPlaces (movieId){
            const response = await axios.get(`Bookings/bookedPlaces/${movieId}`);
            this.moviePlaces = response.data
        }

    }
})
