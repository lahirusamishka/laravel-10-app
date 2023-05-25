<script>
  import { Inertia } from "@inertiajs/inertia";
  import { InertiaLink, page } from "@inertiajs/inertia-svelte";
  import Helmet from "@/Shared/Helmet.svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
  import LoadingButton from "@/Shared/LoadingButton.svelte";
  import TextInput from "@/Shared/TextInput.svelte";
  import SelectInput from "@/Shared/SelectInput.svelte";
  const route = window.route;
  let sending = false;

  $: errors = $page.errors;

  let values = {
    name: "",
    number: "",
    telephone: ""
  };

  function handleChange(e) {
    const key = e.target.name;
    const value = e.target.value;
    values = {
      ...values,
      [key]: value
    };
  }
  function handleSubmit() {
    sending = true;
    Inertia.post(route("rooms.store"), values).then(() => (sending = false));
  }
</script>

<style lang="scss">
.edit-form {
    @apply .bg-white .rounded .shadow .max-w-3xl;
	}
</style>

<Helmet title="Create Room" />

<DashboardLayout>
  <div class="py-8">
    <div>
      <h1 class="mb-8 font-bold text-3xl">
        <InertiaLink
          href={route('rooms.index')}
          class="text-gray-600 hover:text-gray-700">
          Rooms
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
            label="Name"
            name="name"
            type="text"
            errors={errors.name}
            value={values.name}
            onChange={handleChange}
            required />

          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Number"
            name="number"
            type="number"
            errors={errors.number}
            value={values.number}
            onChange={handleChange}
            required />

          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Telephone"
            name="telephone"
            type="tel"
            errors={errors.telephone}
            value={values.telephone}
            onChange={handleChange} />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end
          items-center">
          <LoadingButton loading={sending} type="submit" className="btn-gray">
            Create Room
          </LoadingButton>
        </div>
      </form>
    </div>
  </div>
</DashboardLayout>
