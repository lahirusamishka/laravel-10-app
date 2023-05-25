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
  $: rooms = $page.rooms;

  let values = {
    first_name: "",
    last_name: "",
    job: "",
    salary: "",
    room_id: "",
    keys: null
  };

  function handleChange(e) {
    const key = e.target.name;
    const value = e.target.value;
    values = {
      ...values,
      [key]: value
    };
  }

	let clientErrors = {};
  function validate() {
    let errors = 0;
    if (values.room_id == "") {
      clientErrors.room_id = ["Room is required."];
      errors++;
    }
    return errors === 0;
  }
  function handleSubmit() {
		if (!validate()) return;
    sending = true;
    Inertia.post(route("employees.store"), values).then(
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

<Helmet title="Create Employee" />

<DashboardLayout>
  <div class="py-8">
    <div>
      <h1 class="mb-8 font-bold text-3xl">
        <InertiaLink href={route('employees.index')} class="text-gray-600 hover:text-gray-700">
          Employees

        </InertiaLink>

        <span class="text-gray-600 font-medium">/</span>
        Create
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
            errors={errors.room_id || clientErrors.room_id}
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
                <option value={room.id}>{room.name}</option>
              {/each}
            </MultiSelect>
          </div>
        </div>

        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end
          items-center">
          <LoadingButton loading={sending} type="submit" className="btn-gray">
            Create Employee
          </LoadingButton>
        </div>

      </form>
    </div>
  </div>
</DashboardLayout>
