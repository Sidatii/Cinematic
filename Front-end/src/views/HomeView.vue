<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="bg-white">
    <main>
      <div>
        <!-- Hero card -->
        <div class="relative">
          <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100" />
          <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative shadow-xl sm:overflow-hidden sm:rounded-2xl">
              <div class="absolute inset-0">
                <img
                  class="h-full w-full object-cover"
                  src="https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                  alt="Cinema room"
                />
                <div
                  class="absolute inset-0 bg-indigo-700 mix-blend-multiply"
                />
              </div>
              <div
                class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8"
              >
                <h1
                  class="text-center text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl"
                >
                  <span class="block text-white"
                    >The Cinema as never before</span
                  >
                  <span class="block text-indigo-200"
                    >Go back to 80s vibes</span
                  >
                </h1>
                <p
                  class="mx-auto mt-6 max-w-lg text-center text-xl text-indigo-200 sm:max-w-3xl"
                >
                  Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure
                  qui lorem cupidatat commodo. Elit sunt amet fugiat veniam
                  occaecat fugiat aliqua.
                </p>
                <div
                  class="mx-auto mt-10 max-w-sm sm:flex sm:max-w-none sm:justify-center"
                >
                  <div
                    class="space-y-4 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5 sm:space-y-0"
                  >
                    <a
                      href="#"
                      class="flex items-center justify-center rounded-md border border-transparent bg-white px-4 py-3 text-base font-medium text-indigo-700 shadow-sm hover:bg-indigo-50 sm:px-8"
                      >Film gallery</a
                    >
                    <a
                      @click="click"
                      class="flex items-center justify-center rounded-md border border-transparent bg-[#FCC252] bg-opacity-80 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-opacity-70 sm:px-8"
                      >Book your spot</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Logo cloud -->
        <div class="bg-gray-100">
          <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-base font-semibold text-gray-500">
              Our Partners
            </p>
            <div
              class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5"
            >
              <div
                class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1"
              >
                <img
                  class="h-12"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Disney_wordmark.svg/1050px-Disney_wordmark.svg.png?20171113041617"
                  alt="Desney"
                />
              </div>
              <div
                class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1"
              >
                <img
                  class="h-12"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/de/HBO_logo.svg/768px-HBO_logo.svg.png?20220630112314"
                  alt="HBO"
                />
              </div>
              <div
                class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1"
              >
                <img
                  class="h-12"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/1198px-Netflix_2015_logo.svg.png?20190206123158"
                  alt="Netflex"
                />
              </div>
              <div
                class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1"
              >
                <img
                  class="h-12"
                  src="https://seeklogo.com/images/S/shahid-vip-logo-CC56999123-seeklogo.com.png"
                  alt="Chahid MBC"
                />
              </div>
              <div
                class="col-span-2 flex justify-center md:col-span-2 md:col-start-4 lg:col-span-1"
              >
                <img
                  class="h-12"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Logo_SNRT.svg/1168px-Logo_SNRT.svg.png?20210223005125"
                  alt="SNRT"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- More main page content here... -->
    </main>
  </div>
</template>

<script>
import axios from "axios";
import {
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from "@headlessui/vue";

import {
  Bars3Icon,
  ChatBubbleBottomCenterTextIcon,
  ChatBubbleLeftRightIcon,
  InboxIcon,
  QuestionMarkCircleIcon,
  XMarkIcon,
} from "@heroicons/vue/24/outline";

import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const solutions = [
  {
    name: "Inbox",
    description:
      "Get a better understanding of where your traffic is coming from.",
    href: "#",
    icon: InboxIcon,
  },
  {
    name: "Messaging",
    description: "Speak directly to your customers in a more meaningful way.",
    href: "#",
    icon: ChatBubbleBottomCenterTextIcon,
  },
  {
    name: "Live Chat",
    description: "Your customers' data will be safe and secure.",
    href: "#",
    icon: ChatBubbleLeftRightIcon,
  },
  {
    name: "Knowledge Base",
    description: "Connect with third-party tools that you're already using.",
    href: "#",
    icon: QuestionMarkCircleIcon,
  },
];
const navigation = [
  { name: "Pricing", href: "#" },
  { name: "Partners", href: "#" },
  { name: "Company", href: "#" },
];

export default {
  name: "Home",
  methods: {
    click() {
      console.log(this.user)
    }
  },
  components: {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Bars3Icon,
    ChevronDownIcon,
    XMarkIcon,
  },
  data() {
    return {
      solutions,
      navigation,
    };
  },
  beforeMount() {
    console.log("dd")
    this.$forceUpdate();

  }
};
</script>
