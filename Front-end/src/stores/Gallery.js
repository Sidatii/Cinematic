import { defineStore } from 'pinia'
import axios from 'axios'

export const useGalleryStore = defineStore('gallery', {
    state: () => ({
        galMovies: [],
        galMovie: null,
    }),
    getters: {
        movies: (state) => state.galMovies,
        movie: (state) => state.galMovie,
    },
    actions: {
        async getMovies(){
            const response = await axios.get('Movies/getMovies')
            this.galMovies = response.data
        },
        async getMovie(id){
            const response = await axios.get(`Movies/getMovie/${id}`)
            this.galMovie = response.data
        },
        checkFutureDate(x) {
            const date = new Date(x);
            const today = new Date();
            return date >= today;
        },
        async filterMovies(date){
            if (!this.checkFutureDate(date)) {
                alert('Please select a future date')
                return
            }
            this.removeSunday()
            const response = await axios.post(`Movies/filterMovies`, [date])
            this.galMovies = response.data
        },
        removeSunday(){
            const picker = document.getElementById('date1');
            picker.addEventListener('input', function(e){
                const day = new Date(this.value).getUTCDay();
                if([6,0].includes(day)){
                    e.preventDefault();
                    this.value = '';
                    alert('Weekends not allowed');
                }
            });
        }
    }
})
