<script>
  import { page, InertiaLink } from "@inertiajs/inertia-svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
  import Helmet from "@/Shared/Helmet.svelte";
  const route = window.route;
  $: employee = $page.employee;
</script>

<Helmet title="Employee {employee.id}" />

<DashboardLayout>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <InertiaLink
        href={route('employees.index')}
        class="text-gray-600 hover:text-gray-700">
        Employees
      </InertiaLink>
      <span class="text-gray-600 font-medium">/</span>
      <span class="text-gray-800">{employee.id}</span>
    </h1>
  </div>
  <dl>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Full Name</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">{employee.fullName}</dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Job</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">{employee.job}</dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Salary</dt>
    <dd class="text-gray-800 font-normal text-xl mb-4">{employee.salary}</dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Room</dt>
    <dd class="text-blue-800 font-normal text-xl mb-4">
      <InertiaLink href="/rooms/{employee.room_id}">
        {employee.room}
      </InertiaLink>
    </dd>
    <dt class="text-gray-800 font-bold text-2xl mb-2">Keys</dt>
    {#each employee.keyRooms as item}
      <dd class="text-blue-800 font-normal text-xl mb-2">
        <InertiaLink href="/rooms/{item.id}">{item.name}</InertiaLink>
      </dd>
      {:else}
      <dd class="text-gray-800 font-normal text-xl mb-1">No keys found.</dd>
    {/each}
  </dl>
</DashboardLayout>
