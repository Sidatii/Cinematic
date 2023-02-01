<template>
  <header>
    <Popover class="relative bg-white">
      <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Your Company</span>
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
          <Popover class="relative" v-slot="{ open }">
            <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500', 'group inline-flex items-center rounded-md bg-white text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']">
              <span>Solutions</span>
              <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
            </PopoverButton>

            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
              <PopoverPanel class="absolute z-10 -ml-4 mt-3 w-screen max-w-md transform lg:left-1/2 lg:ml-0 lg:max-w-2xl lg:-translate-x-1/2">
                <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                  <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                    <a v-for="item in solutions" :key="item.name" :href="item.href" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                      <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-indigo-600 text-white sm:h-12 sm:w-12">
                        <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                      </div>
                      <div class="ml-4">
                        <p class="text-base font-medium text-gray-900">{{ item.name }}</p>
                        <p class="mt-1 text-sm text-gray-500">{{ item.description }}</p>
                      </div>
                    </a>
                  </div>
                </div>
              </PopoverPanel>
            </transition>
          </Popover>

          <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-base font-medium text-gray-500 hover:text-gray-900">{{ item.name }}</a>
        </PopoverGroup>
        <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
          <a href="#" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Sign in</a>
          <a href="#" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-3xl border border-transparent bg-[#FCC252]  px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign up</a>
        </div>
      </div>

      <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
        <PopoverPanel focus class="absolute inset-x-0 top-0 z-30 origin-top-right transform p-2 transition md:hidden">
          <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
              <div class="flex items-center justify-between">
                <div>
                  <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
                </div>
                <div class="-mr-2">
                  <PopoverButton class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Close menu</span>
                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                  </PopoverButton>
                </div>
              </div>
              <div class="mt-6">
                <nav class="grid grid-cols-1 gap-7">
                  <a v-for="item in solutions" :key="item.name" :href="item.href" class="-m-3 flex items-center rounded-lg p-3 hover:bg-gray-50">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-indigo-600 text-white">
                      <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                    </div>
                    <div class="ml-4 text-base font-medium text-gray-900">{{ item.name }}</div>
                  </a>
                </nav>
              </div>
            </div>
            <div class="py-6 px-5">
              <div class="grid grid-cols-2 gap-4">
                <a v-for="item in navigation" :key="item.name" :href="item.href" class="text-base font-medium text-gray-900 hover:text-gray-700">{{ item.name }}</a>
              </div>
              <div class="mt-6">
                <a href="#" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign up</a>
                <p class="mt-6 text-center text-base font-medium text-gray-500">
                  Existing customer?
                  <a href="navbar" class="text-gray-900">Sign in</a>
                </p>
              </div>
            </div>
          </div>
        </PopoverPanel>
      </transition>
    </Popover>
  </header>
</template>

<script setup>
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
  
  const solutions = [
    {
      name: 'Movies gallery',
      description: 'Discover our playlist',
      href: '#',
      icon: icon-eye,
    },
    {
      name: 'Messaging',
      description: 'Speak directly to your customers in a more meaningful way.',
      href: '#',
      icon: ChatBubbleBottomCenterTextIcon,
    },
    {
      name: 'Live Chat',
      description: "Your customers' data will be safe and secure.",
      href: '#',
      icon: ChatBubbleLeftRightIcon,
    },
    {
      name: 'Knowledge Base',
      description: "Connect with third-party tools that you're already using.",
      href: '#',
      icon: QuestionMarkCircleIcon,
    },
  ]
  const navigation = [
    { name: 'Pricing', href: '#' },
    { name: 'Partners', href: '#' },
    { name: 'Company', href: '#' },
  ]
  </script>