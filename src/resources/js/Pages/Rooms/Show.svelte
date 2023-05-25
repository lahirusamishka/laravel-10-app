<script>
  import { page, InertiaLink } from "@inertiajs/inertia-svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
  import Helmet from "@/Shared/Helmet.svelte";
  $: room = $page.room;
  const route = window.route;
</script>

<Helmet title="Room {room.id}" />
<DashboardLayout>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <InertiaLink
        href={route('rooms.index')}
        class="text-gray-600 hover:text-gray-700">
        Rooms
      </InertiaLink>
      <span class="text-gray-600 font-medium">/</span>
      <span class="text-gray-800">{room.id}</span>
    </h1>
  </div>
  <dl>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Number</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">{room.number}</dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Name</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">{room.name}</dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Telephone</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">
      {room.telephone || '-'}
    </dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Employees</dt>
    <div class="mb-4">
      {#each room.employees as employee}
        <dd class="text-blue-800 font-normal text-xl mb-2">
          <InertiaLink href="/employees/{employee.id}">
            {employee.first_name} {employee.last_name}
          </InertiaLink>
        </dd>
      {:else}
        <dd class="text-gray-800 font-normal text-xl mb-2">
          No employees found.
        </dd>
      {/each}
    </div>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Avg salary</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">{room.salary || '-'}</dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Keys</dt>
    {#each room.keys as employee}
      <dd class="text-blue-800 font-normal text-xl mb-2">
        <InertiaLink href="/employees/{employee.id}">
          {employee.first_name} {employee.last_name}
        </InertiaLink>
      </dd>
    {:else}
      <dd class="text-gray-800 font-normal text-xl mb-2">No keys found.</dd>
    {/each}
  </dl>
</DashboardLayout>
