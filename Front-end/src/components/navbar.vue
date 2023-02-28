<template>
  <header>
    <Popover class="relative bg-white">
      <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Cinostalgia</span>
            <img class="h-8 w-auto sm:h-10" src="../assets/CinNostalgia_logo.svg" alt="" />
          </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <PopoverButton class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <span class="sr-only">Open menu</span>
            <Bars3Icon class="h-6 w-6" aria-hidden="true" />
          </PopoverButton>
        </div>
        <PopoverGroup as="nav" class="hidden space-x-10 md:flex">

          <RouterLink v-for="item in navigation" :to="item.href" class="text-base font-medium text-gray-500 hover:text-gray-900">{{ item.name }}</RouterLink>
        </PopoverGroup>
        <div v-if="user" class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
          <RouterLink to="/signin" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">signin</RouterLink>
          
          <!-- <a href="#" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-3xl border border-transparent bg-[#FCC252]  px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign up</a> -->
          <RouterLink to="/signup" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-3xl border border-transparent bg-[#FCC252]  px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">signup</RouterLink>
        </div>
        <div v-else class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
          <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="" alt="user photo">
          </button>
          <!-- Dropdown menu -->
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white"></span>
              <span class="block text-sm font-medium text-gray-500 truncate"></span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
              </li>
            </ul>
          </div>
          <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
        </div>
      </div>


      <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
        <PopoverPanel focus class="absolute inset-x-0 top-0 z-30 origin-top-right transform p-2 transition md:hidden">
          <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
              <div class="flex items-center justify-between">
                <div>
                  <img class="h-8 w-auto" src="../assets/CinNostalgia_logo.svg" alt="Cinostalgia" />
                </div>
                <div class="-mr-2">
                  <PopoverButton class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Close menu</span>
                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                  </PopoverButton>
                </div>
              </div>
              
            </div>
            <div class="py-6 px-5">
              <div class="grid grid-cols-2 gap-4">
                <RouterLink v-for="item in navigation" :to="item.href" class="text-base font-medium text-gray-500 hover:text-gray-900">{{ item.name }}</RouterLink>
              </div>
              <div class="mt-6">
                <RouterLink to="/signup" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">signin</RouterLink>
                <p class="mt-6 text-center text-base font-medium text-gray-500">
                  Existing customer?
                  <RouterLink to="/signin" class="text-gray-900">signin</RouterLink>
                </p>
              </div>
            </div>
          </div>
        </PopoverPanel>
      </transition>
    </Popover>
  </header>
</template>

<script>
  import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
  import {
    Bars3Icon,
    ChatBubbleBottomCenterTextIcon,
    ChatBubbleLeftRightIcon,
    InboxIcon,
    QuestionMarkCircleIcon,
    XMarkIcon,
  } from '@heroicons/vue/24/outline'
  import { ChevronDownIcon } from '@heroicons/vue/20/solid'
  import axios from "axios";
  

  const navigation = [
    { name: 'Home', href: '/' },
    { name: 'About', href: '/About' },
    { name: 'Galley', href: '/galley' },
    { name: 'Contact', href: '/contact' },
    { name: 'book', href: '/book' }

  ]

  export default {
    components: {
      Popover,
      PopoverButton,
      PopoverGroup,
      PopoverPanel,
      Bars3Icon,
      ChatBubbleBottomCenterTextIcon,
      ChatBubbleLeftRightIcon,
      InboxIcon,
      QuestionMarkCircleIcon,
      XMarkIcon,
      ChevronDownIcon,
    },
    data() {
      return {
        navigation,
        user: null
      }
    },
    setup() {
      return { navigation }
    },

  }
  </script>