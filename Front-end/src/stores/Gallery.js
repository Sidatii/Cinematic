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
        async filterMovies(date){
            const response = await axios.post(`Movies/filterMovies`, [date])
            this.galMovies = response.data
        }
    }
})
