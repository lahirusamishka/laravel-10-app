<script>
  import { page } from "@inertiajs/inertia-svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
	import Helmet from "@/Shared/Helmet.svelte";
	import Table from "@/Shared/Table.svelte";

  $: rooms = $page.rooms;
  $: user = $page.auth.user;

  let sort = {
    value: "name",
    order: "asc"
  };

  let keys = [
    { value: "name", label: "Name" },
    { value: "number", label: "Number" },
    { value: "telephone", label: "Telephone" }
  ];
</script>

<Helmet title="Rooms" />

<DashboardLayout>
	<Table objects={rooms} user={user} objectName="room" sort={sort} keys={keys}></Table>
</DashboardLayout>
