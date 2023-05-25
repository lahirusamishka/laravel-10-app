<script>
  import { InertiaLink, page } from "@inertiajs/inertia-svelte";
  const route = window.route;
  import Menu from "@/Shared/Menu.svelte";
  $: user = $page.auth.user;
  let mobileMenu =  false;
</script>

<div
  class="bg-gray-800 border-b border-gray-700 w-full px-8 p-4 md:py-4 md:px-12
  text-sm d:text-md flex justify-end items-center md:hidden">
  <div class="relative">

    <div class="relative md:hidden">
      <svg
        on:click={() => (mobileMenu = true)}
        class="fill-current text-white w-6 h-6 cursor-pointer"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20">
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
      </svg>

      <div class="absolute right-0 z-20 {mobileMenu ? 'flex' : 'hidden'}">
        <Menu
          className="relative z-20 mt-2 px-8 py-4 pb-2 shadow-lg bg-gray-800
          rounded"/>
        <div
          on:click={() => (mobileMenu = false)}
          class="bg-black opacity-25 fixed inset-0 z-10" />
      </div>
    </div>
  </div>
</div>
