<script setup>
import {useGalleryStore} from "@/stores/Gallery";
import {ref} from 'vue';

import {
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from '@headlessui/vue'
import {ChevronDownIcon} from '@vue-hero-icons/solid'

const galleryStore = useGalleryStore();
import {onMounted} from "vue";

onMounted(async () => {
  await galleryStore.getMovies();
})

const sortOptions = [
  {name: 'Most Popular', href: '#', current: true},
  {name: 'Best Rating', href: '#', current: false},
  {name: 'Newest', href: '#', current: false},
  {name: 'Price: Low to High', href: '#', current: false},
  {name: 'Price: High to Low', href: '#', current: false},
]
const filters = [
  {
    id: 'category',
    name: 'Category',
    options: [
      {value: 'new-arrivals', label: 'All New Arrivals', checked: false},
      {value: 'tees', label: 'Tees', checked: false},
      {value: 'objects', label: 'Objects', checked: true},
      {value: 'sweatshirts', label: 'Sweatshirts', checked: false},
      {value: 'pants-shorts', label: 'Pants & Shorts', checked: false},
    ],
  },
  {
    id: 'color',
    name: 'Color',
    options: [
      {value: 'white', label: 'White', checked: false},
      {value: 'beige', label: 'Beige', checked: false},
      {value: 'blue', label: 'Blue', checked: false},
      {value: 'brown', label: 'Brown', checked: false},
      {value: 'green', label: 'Green', checked: false},
      {value: 'purple', label: 'Purple', checked: false},
    ],
  },
  {
    id: 'sizes',
    name: 'Sizes',
    options: [
      {value: 'xs', label: 'XS', checked: false},
      {value: 's', label: 'S', checked: false},
      {value: 'm', label: 'M', checked: false},
      {value: 'l', label: 'L', checked: false},
      {value: 'xl', label: 'XL', checked: false},
      {value: '2xl', label: '2XL', checked: false},
    ],
  },
]
const activeFilters = [{value: 'objects', label: 'Objects'}]
const products = [
  {
    id: 1,
    name: 'Earthen Bottle',
    href: '#',
    price: '$48',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg',
    imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
  },
  {
    id: 2,
    name: 'Nomad Tumbler',
    href: '#',
    price: '$35',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg',
    imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
  },
  {
    id: 3,
    name: 'Focus Paper Refill',
    href: '#',
    price: '$89',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg',
    imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
  },
  {
    id: 4,
    name: 'Machined Mechanical Pencil',
    href: '#',
    price: '$35',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg',
    imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
  },
  // More products...
]

const mobileFiltersOpen = ref(false)

</script>


<template>
  <div class="flex gap-1" v-for="movie in galleryStore.movie">
    <img class="rounded-3xl shadow-lg max-w-[200px]"
         src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1LRLLWGvs5sZdTzuMqLEahb88Pc.jpg" alt="">
  </div>
  <div class="bg-gray-50">

    <!-- Filters -->
    <section aria-labelledby="filter-heading">
      <h2 id="filter-heading" class="sr-only">Filters</h2>

      <div class="relative z-10 border-b border-gray-200 bg-white pb-4">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
          <Menu as="div" class="relative inline-block text-left">
            <div>
              <MenuButton
                  class="inline-flex justify-center text-sm font-medium text-gray-700 group hover:text-gray-900">
                Sort
                <ChevronDownIcon class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                 aria-hidden="true"/>
              </MenuButton>
            </div>

            <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="scale-95 transform opacity-0" enter-to-class="scale-100 transform opacity-100"
                        leave-active-class="transition duration-75 ease-in"
                        leave-from-class="scale-100 transform opacity-100"
                        leave-to-class="scale-95 transform opacity-0">
              <MenuItems
                  class="absolute left-0 mt-2 w-40 origin-top-left rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="py-1">
                  <MenuItem v-for="option in sortOptions" :key="option.name" v-slot="{ active }">
                    <a :href="option.href"
                       :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">
                      {{ option.name }}
                    </a>
                  </MenuItem>
                </div>
              </MenuItems>
            </transition>
          </Menu>

          <button type="button" class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden"
                  @click="mobileFiltersOpen = true">Filters
          </button>

          <div class="hidden sm:block">
            <div class="flow-root">
              <PopoverGroup class="-mx-4 flex items-center divide-x divide-gray-200">
                <Popover v-for="(section, sectionIdx) in filters" :key="section.name"
                         class="relative inline-block px-4 text-left">
                  <PopoverButton
                      class="inline-flex justify-center text-sm font-medium text-gray-700 group hover:text-gray-900">
                    <span>{{ section.name }}</span>
                    <span v-if="sectionIdx === 0"
                          class="rounded bg-gray-200 text-xs font-semibold tabular-nums text-gray-700 ml-1.5 py-0.5 px-1.5">1</span>
                    <ChevronDownIcon class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                     aria-hidden="true"/>
                  </PopoverButton>

                  <transition enter-active-class="transition duration-100 ease-out"
                              enter-from-class="scale-95 transform opacity-0"
                              enter-to-class="scale-100 transform opacity-100"
                              leave-active-class="transition duration-75 ease-in"
                              leave-from-class="scale-100 transform opacity-100"
                              leave-to-class="scale-95 transform opacity-0">
                    <PopoverPanel
                        class="absolute right-0 mt-2 origin-top-right rounded-md bg-white p-4 shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <form class="space-y-4">
                        <div v-for="(option, optionIdx) in section.options" :key="option.value"
                             class="flex items-center">
                          <input :id="`filter-${section.id}-${optionIdx}`" :name="`${section.id}[]`"
                                 :value="option.value" type="checkbox" :checked="option.checked"
                                 class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"/>
                          <label :for="`filter-${section.id}-${optionIdx}`"
                                 class="ml-3 whitespace-nowrap pr-6 text-sm font-medium text-gray-900">
                            {{ option.label }}
                          </label>
                        </div>
                      </form>
                    </PopoverPanel>
                  </transition>
                </Popover>
              </PopoverGroup>
            </div>
          </div>
        </div>
      </div>

      <!-- Active filters -->
      <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 py-3 sm:flex sm:items-center sm:px-6 lg:px-8">
          <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">
            Filters
            <span class="sr-only">, active</span>
          </h3>

          <div aria-hidden="true" class="hidden h-5 w-px bg-gray-300 sm:ml-4 sm:block"/>

          <div class="mt-2 sm:mt-0 sm:ml-4">
            <div class="-m-1 flex flex-wrap items-center">
                  <span v-for="activeFilter in activeFilters" :key="activeFilter.value"
                        class="m-1 inline-flex items-center rounded-full border border-gray-200 bg-white pr-2 pl-3 text-sm font-medium text-gray-900 py-1.5">
                    <span>{{ activeFilter.label }}</span>
                    <button type="button"
                            class="ml-1 inline-flex h-4 w-4 flex-shrink-0 rounded-full p-1 text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                      <span class="sr-only">Remove filter for {{ activeFilter.label }}</span>
                      <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                        <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"/>
                      </svg>
                    </button>
                  </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Product grid -->
    <section aria-labelledby="products-heading"
             class="mx-auto max-w-2xl px-4 pt-12 pb-16 sm:px-6 sm:pt-16 sm:pb-24 lg:max-w-7xl lg:px-8">
      <h2 id="products-heading" class="sr-only">Products</h2>

      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <a v-for="product in products" :key="product.id" :href="product.href" class="group">
          <div class="w-full overflow-hidden rounded-lg bg-gray-200 aspect-w-1 aspect-h-1 xl:aspect-w-7 xl:aspect-h-8">
            <img :src="product.imageSrc" :alt="product.imageAlt"
                 class="h-full w-full object-cover object-center group-hover:opacity-75"/>
          </div>
          <h3 class="mt-4 text-sm text-gray-700">
            {{ product.name }}
          </h3>
          <p class="mt-1 text-lg font-medium text-gray-900">
            {{ product.price }}
          </p>
        </a>
      </div>
    </section>
  </div>
</template>

