import {defineStore} from 'pinia'
import axios from 'axios'
import {useAuthStore} from "@/stores/Auth";
import router from "@/router";
import Gallery from "@/views/Gallery.vue";
import Swal from "sweetalert2";
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
            const seats = this.selectedSeats
            try {
                const response = await axios.post(`Bookings/bookSeats/`, [
                    ID_user,
                    movieId,
                    seats
                ]);
                console.log(response.data)
                this.movieBooking = response.data;

                await Swal.fire({
                    title: 'Booking confirmed!',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
                await this.router.push('/gallery')
            } catch (error) {
                await Swal.fire({
                    title: 'There was an error, please try again!',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })

            }
        },
        async cancel(id) {
            try {
            // console.log(id)
            // return true
                const response = await axios.delete(`Bookings/cancel/${id}`);


                await Swal.fire({
                    title: response.data.message,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'

                    }
                })
                await this.router.push('/gallery')

            } catch (error) {
                console.log(error)
                await Swal.fire({
                    title: 'There was an error, please try again!',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }
                )
            }
        }

    }
})
