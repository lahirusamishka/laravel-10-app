<script>
  import Menu from "@/Shared/Menu.svelte";
  import FlashMessages from '@/Shared/FlashMessages.svelte';
  import Header from "@/Shared/Header.svelte";
</script>

<div class="flex flex-col">
  <div class="h-screen flex flex-col">
    <div class="md:flex">
      <Header />
    </div>

    <div class="flex flex-grow overflow-hidden">
      <Menu className="bg-gray-800 flex-shrink-0 w-64 p-12 hidden md:flex"/>
      <div class="w-full overflow-hidden px-4 py-10 md:py-16 md:px-12 overflow-y-auto">
        <FlashMessages />
        <slot />
      </div>
    </div>
  </div>
</div>

