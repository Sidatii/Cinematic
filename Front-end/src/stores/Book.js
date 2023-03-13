import {defineStore} from 'pinia'
import axios from 'axios'
import {useAuthStore} from "@/stores/Auth";
//
// const authStore = useAuthStore()
export const useBookingStore = defineStore('booking', {
    state: () => ({
        moviesBooking: null,
        movieBooking: null,
        moviePlaces: null,
        movieSelectedSeats: [],
        movieTotalSelected: 0,
        movieTotal: 0,
        PlaceSelected: Array(50),
    }),
    getters: {
        bookings: (state) => state.moviesBooking,
        booking: (state) => state.movieBooking,
        places: (state) => state.moviePlaces,
        selectedSeats: (state) => state.movieSelectedSeats,
        totalSelected: (state) => state.movieTotalSelected,
        total: (state) => state.movieTotal,
        selected: (state) => state.PlaceSelected,
    },
    actions: {
        async getBookings() {
            const response = await axios.post("Bookings/bookings");
            this.moviesBooking = response.data
        },
        async getPlaces(movieId) {
            const response = await axios.get(`Bookings/bookedPlaces/${movieId}`);
            this.moviePlaces = response.data
        },
        isReserved(i) {
            return this.places.includes(i);
        },
        selectSeat(id) {
            if (this.movieSelectedSeats.includes(id)) {
                this.movieSelectedSeats.splice(this.selectedSeats.indexOf(id), 1);
                this.PlaceSelected[id] = '';
            } else {
                this.movieSelectedSeats.push(id);
                this.PlaceSelected[id] = 'selected';
            }
            this.movieTotalSelected = this.selectedSeats.length;
            this.movieTotal = this.totalSelected * 50;
        },
        async bookSeats(movieId, ID_user) {
            console.log(ID_user)
            return true;
            const seats = this.selectedSeats
            try {
                const response = await axios.post(`Bookings/bookSeats/`, [
                    ID_user,
                    movieId,
                    seats,
                ]);
                this.movieBooking = response.data;
            } catch (error) {
                console.log(error)
            }
        }

    }
})
