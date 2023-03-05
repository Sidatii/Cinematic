import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authUser: null,
    authToken: null,
    authError: null
  }),
  getters: {
    user: (state) => state.authUser,
    token: (state) => state.authToken,
    errors: (state) => state.authError
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
      this.authError = [];
      try {
      const response = await axios.post('Users/signin', {
        token: form.token
      });

        localStorage.setItem('token', form.token);
        this.authUser = response.data;
        await this.router.push('/');
      }catch (error){
        // You are hereeeee
        if (error.status === 406)
        this.authError = error.response.data.error
      }
    },
    async signUp(form) {
      this.authError = [];
      try {
        const response = await axios.post('Users/signup', {
          firstName: form.firstName,
          lastName: form.lastName,
          email: form.email
        })
        this.authToken = response.data.Token
        await this.router.push('/signin')
      }catch (error){
        this.authError = error.response.data.error
      }
    },
    async logOut(){
      localStorage.clear();
      this.authUser = null;
      await this.router.push('/signin')
    }
  }
})
