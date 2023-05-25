<script>
  import { Inertia } from "@inertiajs/inertia";
	import { InertiaLink, page } from "@inertiajs/inertia-svelte";
	import validator from "validator";
  import Helmet from "@/Shared/Helmet.svelte";
  import DashboardLayout from "@/Shared/DashboardLayout.svelte";
  import LoadingButton from "@/Shared/LoadingButton.svelte";
  import TextInput from "@/Shared/TextInput.svelte";
  import SelectInput from "@/Shared/SelectInput.svelte";
  const route = window.route;
  let sending = false;

  $: errors = $page.errors;
  $: user = $page.auth.user;

  let { user } = $page.auth;
  let values = {
    name: user.name || "",
    email: user.email || "",
    password: "",
    admin: user.admin ? "1" : "0"
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
		if (!validate()) return;
		else clientErrors = {};
    sending = true;
    Inertia.put(route("profile.update", values)).then(() => (sending = false));
  }

  function destroy(id) {
    if (confirm("Are you sure you want to delete your account?")) {
      Inertia.delete(route("profile.destroy"));
    }
	}

	let clientErrors = {};

  function validate() {
    let errors = 0;
    if (validator.isEmpty(values.name)) {
      clientErrors.name = ["Name is required."];
      errors++;
    }
    if (!validator.isEmail(values.email)) {
      clientErrors.email = ["You must provide valid email."];
      errors++;
    }else {
			values.email = validator.normalizeEmail(values.email);
		}
    if (validator.isEmpty(values.email)) {
      clientErrors.email = ["Email is required."];
      errors++;
    }
    if (values.password.length && values.password.length<8) {
      clientErrors.password = ["Password minimal length is 8 characters."];
      errors++;
		}

    return errors === 0;
  }
</script>

<Helmet title="My Profile" />

<DashboardLayout>
  <div class="py-8">
    <div>
      <h1 class="mb-8">
        <span class="font-bold text-3xl text-gray-800">My Profile</span>
      </h1>
    </div>
    <div class="bg-white rounded shadow overflow-hidden max-w-3xl">
      <form name="createForm" on:submit|preventDefault={handleSubmit}>
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Name"
            name="name"
						type="text"
            errors={errors.name || clientErrors.name}
            value={values.name}
            onChange={handleChange}
						/>
          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Email"
            name="email"
						type="text"
            errors={errors.email || clientErrors.email}
            value={values.email}
            onChange={handleChange}
						 />
          <TextInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Password"
            name="password"
            type="password"
            errors={errors.password || clientErrors.password}
            value={values.password}
            onChange={handleChange} />
          <SelectInput
            className="pr-6 pb-8 w-full lg:w-1/2"
            label="Role"
            name="admin"
            errors={errors.admin}
            value={values.admin}
            onChange={handleChange}
						>
            <option value="0">User</option>
            <option value="1" selected={user.admin} disabled={!user.admin}>
              Admin
            </option>
          </SelectInput>
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex
          justify-between items-center">
          <div
            on:click|stopPropagation={destroy(user.id)}
            class="text-sm cursor-pointer">
            Delete Account
          </div>
          <LoadingButton loading={sending} type="submit" className="btn-gray">
            Update Profile
          </LoadingButton>
        </div>

      </form>
    </div>
  </div>
</DashboardLayout>


