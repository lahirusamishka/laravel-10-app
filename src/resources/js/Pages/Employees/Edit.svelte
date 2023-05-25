<script>
  import { Inertia } from "@inertiajs/inertia";
  import { InertiaLink, page } from "@inertiajs/inertia-svelte";
  import Helmet from "@/Shared/Helmet.svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
  import LoadingButton from "@/Shared/LoadingButton.svelte";
  import TextInput from "@/Shared/TextInput.svelte";
  import MultiSelect from "@/Shared/MultiSelect.svelte";
  import SelectInput from "@/Shared/SelectInput.svelte";

  const route = window.route;
  let sending = false;

  $: errors = $page.errors;
  $: employee = $page.employee;
  $: roomObjects = $page.roomObjects;
  $: rooms = $page.rooms;

  let { employee } = $page;
  let { roomObjects } = $page;
  let values = {
    first_name: employee.first_name || "",
    last_name: employee.last_name || "",
    job: employee.job || "",
    salary: employee.salary || "",
    room_id: employee.room_id || "",
    keys: roomObjects.map(x => x.id)
  };

  function handleChange(e) {
    const key = e.target.name;
    const value = e.target.value;
    values = {
      ...values,
      [key]: value
    };
  }

  function destroy(id) {
    if (confirm("Are you sure you want to delete this employee?")) {
      Inertia.delete(route("employees.destroy", id));
    }
  }

  function handleSubmit() {
    sending = true;
    Inertia.put(route("employees.update", employee.id), values).then(
      () => (sending = false)
    );
  }
</script>

<style lang="scss">
  .edit-form {
    @apply .bg-white .rounded .shadow .max-w-3xl;
  }

  .form-label {
    @apply .mb-2 .block .text-gray-800 .select-none;
  }
</style>

<Helmet title="Edit Employee" />

<DashboardLayout>
  <div class="py-8">
    <div>
      <h1 class="mb-8 font-bold text-3xl">
        <InertiaLink
          href={route('employees.index')}
          class="text-gray-600 hover:text-gray-700">
          Employees
        </InertiaLink>
        <span class="text-gray-600 font-medium">/</span>
        <InertiaLink
          href={route('employees.show', employee.id)}
          class="text-gray-600 hover:text-gray-700">
          {employee.id}
        </InertiaLink>
        <span class="text-gray-600 font-medium">/</span>
        Edit
      </h1>
    </div>

    <div class="edit-form">
      <form name="createForm" on:submit|preventDefault={handleSubmit}>
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="First Name"
            name="first_name"
            type="text"
            errors={errors.first_name}
            value={values.first_name}
            onChange={handleChange}
            required />

          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Last Name"
            name="last_name"
            type="text"
            errors={errors.last_name}
            value={values.last_name}
            onChange={handleChange}
            required />

          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Job"
            name="job"
            type="text"
            errors={errors.job}
            value={values.job}
            onChange={handleChange}
            required />

          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Salary"
            name="salary"
            type="number"
            errors={errors.salary}
            value={values.salary}
            onChange={handleChange}
            required />

          <SelectInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Room"
            name="room_id"
            errors={errors.room_id}
            value={values.room_id}
            onChange={handleChange}
            required>
            <option selected disabled>Select Room</option>

            {#each rooms as room}
              <option value={room.id}>{room.name}</option>
            {/each}
          </SelectInput>

          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Keys:</label>
            <MultiSelect bind:value={values.keys}>
              {#each rooms as room}
                {#if values.keys.includes(room.id)}
                  <option value={room.id} selected>{room.name}</option>
                {:else}
                  <option value={room.id}>{room.name}</option>
                {/if}
              {/each}
            </MultiSelect>
          </div>
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex
          justify-between items-center">
          <div
            on:click|stopPropagation={destroy(employee.id)}
            class="text-sm cursor-pointer">
            Delete Employee
          </div>
          <LoadingButton loading={sending} type="submit" className="btn-gray">
            Update Employee
          </LoadingButton>
        </div>

      </form>
    </div>
  </div>
</DashboardLayout>
