<script>
  import { page } from "@inertiajs/inertia-svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
	import Helmet from "@/Shared/Helmet.svelte";
	import Table from "@/Shared/Table.svelte";

  $: employees = $page.employees;
  $: user = $page.auth.user;

  let sort = {
    value: "fullName",
    order: "asc"
  };

  let keys = [
    { value: "fullName", label: "Name" },
    { value: "room", label: "Room" },
    { value: "telephone", label: "Telephone" },
    { value: "job", label: "Job" }
  ];
</script>

<Helmet title="Employees" />

<DashboardLayout>
		<Table objects={employees} user={user} objectName="employee" sort={sort} keys={keys}></Table>
</DashboardLayout>
