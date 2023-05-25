<script>
  import { Inertia } from "@inertiajs/inertia";
  import { page, InertiaLink } from "@inertiajs/inertia-svelte";
  import { fly } from "svelte/transition";
  import Helmet from "@/Shared/Helmet.svelte";
  import LoadingButton from "@/Shared/LoadingButton.svelte";
  import TextInput from "@/Shared/TextInput.svelte";
  import validator from "validator";
  let sending = false;
  const route = window.route;

  $: errors = $page.errors;
  let name = "";
  let values = {
    name: "",
    email: "",
    password: "",
    password_confirmation: ""
  };

  function handleChange(e) {
    const key = e.target.name;
    const value = e.target.value;
    clientErrors[key] = [];
    values = {
      ...values,
      [key]: value
    };
  }

  function handleSubmit() {
    if (!validate()) return;
    else clientErrors = {};
    sending = true;
    Inertia.post(route("register.attempt"), values).then(() => {
      sending = false;
    });
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
    } else {
      values.email = validator.normalizeEmail(values.email);
    }
    if (validator.isEmpty(values.email)) {
      clientErrors.email = ["Email is required."];
      errors++;
    }
    if (values.password !== values.password_confirmation) {
      clientErrors.password = ["Password confirmation doesnt match password."];
      errors++;
    }
    if (values.password.length < 8) {
      clientErrors.password = ["Password minimal length is 8 characters."];
      errors++;
    }
    if (validator.isEmpty(values.password)) {
      clientErrors.password = ["Password is required."];
      errors++;
    }
    return errors === 0;
  }
</script>

<style lang="scss" src="./style.scss">

</style>

<Helmet title="Register" />

<div class="form-page">
  <div class="w-full max-w-md">
    <form
      on:submit|preventDefault={handleSubmit}
      class="rounded-form"
      in:fly={{ y: 200, delay: 180, duration: 400 }}>
      <div class="px-10 py-12">
        <h1 class="text-center font-bold text-3xl">StaffMaster</h1>
        <h2 class="text-center font-bold text-xl">Register</h2>
        <div class="mx-auto mt-6 w-24 border-b-2" />
        <TextInput
          className="mt-8"
          label="Full Name"
          name="name"
          type="text"
          errors={errors.name || clientErrors.name}
          value={values.name}
          onChange={handleChange}
          required />
        <TextInput
          className="mt-5"
          label="Email"
          name="email"
          type="email"
          errors={errors.email || clientErrors.email}
          value={values.email}
          onChange={handleChange}
          required />
        <TextInput
          className="mt-5"
          label="Password"
          name="password"
          type="password"
          errors={errors.password || clientErrors.password}
          value={values.password}
          onChange={handleChange}
          required />
        <TextInput
          className="mt-5"
          label="Password confirmation"
          name="password_confirmation"
          type="password"
          errors={clientErrors.password_confirmation}
          value={values.password_confirmation}
          onChange={handleChange}
          required />
      </div>
      <div class="form-bottom">
        <span class="block text-sm text-gray-800">
          <InertiaLink href={route('login')}>
            Log In
            <span class="hidden md:inline">with an existing account</span>
          </InertiaLink>
        </span>
        <LoadingButton type="submit" loading={sending} className="btn-gray">
          Register
        </LoadingButton>
      </div>
    </form>
  </div>
</div>
