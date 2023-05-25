<script>
  import { Inertia } from "@inertiajs/inertia";
  import { page } from "@inertiajs/inertia-svelte";
  import Helmet from "@/Shared/Helmet.svelte";

  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
  $: user = $page.auth.user;
</script>

<Helmet title="Dashboard" />

<DashboardLayout>
  <h1 class="mb-6 font-bold text-4xl">Welcome back, {user.name}.</h1>
  <p>
    {user.admin ? 'You have admin rights.' : 'You do not have admin rights.'}
  </p>
</DashboardLayout>
