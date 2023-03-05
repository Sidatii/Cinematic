import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null,
    authToken: null
  }),
  getters: {
    user: (state) => state.authUser,
    token: (state) => state.authToken

  },
  actions: {
    async getUser() {
      const response = await axios.post("Users/getUser",
          {
            'token': localStorage.getItem('token')
          });
      this.authUser = response.data
    },
    async logIn(form){
      const response = await axios.post('Users/signin', {
        token: form.token
      });
      if(response.data.status === 1){
        localStorage.setItem('token', response.data.Token)
        await this.router.push('/')
      }
    },
    async signUp(form){
      const response = await axios.post('Users/signup', {
        firstName: form.firstName,
        lastName: form.lastName,
        email: form.email
      })
      this.authToken = response.data.Token
      await this.router.push('/signin')
    },
    async logOut(){
      localStorage.clear();
      await this.router.push('/signin')
    }
  }
})
