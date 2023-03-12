import { defineStore } from 'pinia'
import axios from 'axios'

export const useGalleryStore = defineStore('gallery', {
    state: () => ({
        galMovies: null,
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
            const response = await axios.post('Movies/getMovie', {
                'id': id
            })
            this.galMovies = response.data
        }
    }
})
