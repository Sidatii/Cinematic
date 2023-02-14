<template>
  <div
    class="w-full my-5 max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 mx-auto"
  >
    <form
      class="space-y-6"
      @submit.prevent="logIn"
    >
      <h5 class="text-xl font-medium text-[#245BA8] text-center">Sign in</h5>
      <div>
        <label for="token" class="block mb-2 text-sm font-medium text-gray-900"
          >Your Token</label
        >
        <input
          type="password"
          v-model="token"
          id="password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 <?php echo (!empty($data['email_err'])) ? 'border-red-500' : ''; ?>"
          placeholder="*******************"
        />
        <p class="text-xs italic text-red-500">
        </p>
      </div>
      
      <div class="flex items-start">
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input
              id="remember"
              type="checkbox"
              value=""
              class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
            />
          </div>
          <label for="remember" class="ml-2 text-sm font-medium text-gray-900"
            >Remember me</label
          >
        </div>
        <a href="#" class="ml-auto text-sm text-[#245BA8] hover:underline"
          >Lost token?</a
        >
      </div>
      <button
        type="submit"
        class="w-full text-white bg-[#245BA8] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
      >
        Login
      </button>

      <div class="text-sm font-medium text-gray-500">
        Not registered?
        <RouterLink to="/signup" class="text-[#245BA8] hover:underline">Create account</RouterLink>
      </div>
    </form>
  </div>
</template>


<script>
import axios from 'axios';
import { RouterLink } from 'vue-router';
export default {
    name: 'login',
    Data(){
        return {
            token: ''
        };
    },
    methods: {
        async logIn(){
            const response = await axios.post('Users/signin', {
                token: this.token
            })
            if(response.data.status == 1){
              alert(response.data.message)
            }
        }
    }
}
</script>
