<script>
  export let className = "";
  import MenuItem from "@/Shared/MenuItem.svelte";
</script>

<div
  class="flex flex-col justify-between {className}">
  <div class="flex-1">
  <MenuItem text="Dashboard" link="dashboard" icon="dashboard" />
  <MenuItem text="Employees" link="employees.index" icon="work" />
  <MenuItem text="Rooms" link="rooms.index" icon="domain" />
  </div>
  <div class="flex-none">
  <MenuItem text="My Profile" link="profile" icon="account_circle" />
  <MenuItem text="Logout" link="logout" icon="cancel" />
  </div>

</div>
