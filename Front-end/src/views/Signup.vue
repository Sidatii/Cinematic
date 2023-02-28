<template>
  <div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
      <!-- Row -->
      <div class="w-full xl:w-3/4 lg:w-11/12 flex">
        <!-- Col -->
        <div
          class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
          style="
            background-image: url('https://images.unsplash.com/photo-1560109947-543149eceb16?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1935&q=80');
          "
        ></div>
        <!-- Col -->
        <div
          class="w-full lg:w-7/12 bg-gray-50 p-5 rounded-lg lg:rounded-l-none"
        >
          <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
          <form
            class="px-8 pt-6 pb-8 mb-4 bg-gray-50 rounded"
            @submit.prevent="signUp"
          >
            <div class="mb-4 md:flex md:justify-between">
              <div class="mb-4 md:mr-2 md:mb-0">
                <label
                  class="block mb-2 text-sm font-bold text-gray-700"
                  for="firstName"
                >
                  First Name
                </label>
                <input
                  class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                  v-model="firstName"
                  type="text"
                  placeholder="First Name"
                />
                <p class="text-xs italic text-red-500">
                </p>
              </div>
              <div class="md:ml-2">
                <label
                  class="block mb-2 text-sm font-bold text-gray-700"
                  for="lastName"
                >
                  Last Name
                </label>
                <input
                  class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                  v-model="lastName"
                  type="text"
                  placeholder="Last Name"
                />
                <p class="text-xs italic text-red-500">
                </p>
              </div>
            </div>
            <div class="mb-4">
              <label
                class="block mb-2 text-sm font-bold text-gray-700"
                for="email"
              >
                Email
              </label>
              <input
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                v-model="email"
                type="email"
                placeholder="Email"
              />
              <p class="text-xs italic text-red-500">
              </p>
            </div>
            <div class="mb-4 md:flex md:justify-between">
            </div>
            <div class="mb-6 text-center">
              <button
                type="submit"
                class="w-full px-4 py-2 font-bold text-white bg-[#245BA8] rounded-full hover:bg-[#245BA] focus:outline-none focus:shadow-outline"
              >
                Register Account
              </button>
            </div>
            <hr class="mb-6 border-t" />
            <div class="text-center">
              <a
                class="inline-block text-sm text-[#245BA8] align-baseline hover:text-blue-800"
                href="#"
              >
                Forgot Password?
              </a>
            </div>
            <div class="text-center">
              <RouterLink
                class="inline-block text-sm text-[#245BA8] align-baseline hover:text-blue-800"
                to="/signin"
              >
                Already have an account? Login!
              </RouterLink>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import axios from 'axios'
export default {
    name: 'signup',
    Data(){
        return {
            firstName : '',
            lastName : '',
            email: ''
        };
    },
    methods: {
        async signUp(){
          const router = RouterLink;
           const response = await axios.post('Users/signup', {
                firstName: this.firstName,
                lastName: this.lastName,
                email: this.email
            })
          this.$router.push('/signin');
        }
    }
}
</script>
