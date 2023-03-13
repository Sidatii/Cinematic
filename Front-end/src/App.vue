<script setup>
import {RouterLink, RouterView} from 'vue-router'
import Foooter from './components/footer.vue';
import Navbar from "@/components/navbar.vue";
import {onMounted} from "vue";
import { useAuthStore} from "@/stores/Auth";

const authStore = useAuthStore();

onMounted (async () => {
    await authStore.getUser();
})

</script>

<template>
  <navbar/>
  <RouterView/>
  <Foooter/>
</template>


