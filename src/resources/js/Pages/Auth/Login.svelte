<script>
  import { Inertia } from "@inertiajs/inertia";
  import { page, InertiaLink } from "@inertiajs/inertia-svelte";
  import { fly } from "svelte/transition";
  import LoadingButton from "@/Shared/LoadingButton.svelte";
  import Helmet from "@/Shared/Helmet.svelte";
  import TextInput from "@/Shared/TextInput.svelte";
  $: errors = $page.errors;
  let sending = false;
  let values = {
    email: "demo@example.com",
    password: "password",
    remember: true
  };
  const route = window.route;
  function handleChange(e) {
    const key = e.target.name;
    const value =
      e.target.type === "checkbox" ? e.target.checked : e.target.value;
    values = {
      ...values,
      [key]: value
    };
  }
  function handleSubmit() {
    sending = true;
    Inertia.post(route("login.attempt"), values)
      .then(() => {
        sending = false;
      })
      .catch(e => console.log(e));
  }
</script>

<style lang="scss" src="./style.scss">

</style>

<Helmet title="Login" />
<div class="form-page">
  <div class="w-full max-w-md">
    <form
      on:submit|preventDefault={handleSubmit}
      class="rounded-form"
      in:fly={{ y: 200, delay: 180, duration: 400 }}>
      <div class="px-10 py-12">
        <h1 class="text-center font-bold text-3xl">StaffMaster</h1>
        <h2 class="text-center font-bold text-xl">LogIn</h2>
        <div class="mx-auto mt-6 w-24 border-b-2" />
        <TextInput
          className="mt-8"
          label="Email"
          name="email"
          type="email"
          errors={errors.email}
          value={values.email}
          onChange={handleChange}
          required />
        <TextInput
          className="mt-5"
          label="Password"
          name="password"
          type="password"
          errors={errors.password}
          value={values.password}
          onChange={handleChange}
          required />
        <label class="mt-6 select-none flex items-center" for="remember">
          <input
            name="remember"
            id="remember"
            class="mr-1"
            type="checkbox"
            checked={values.remember}
            on:change={handleChange} />
          <span class="text-sm">Remember Me</span>
        </label>
      </div>
      <div class="form-bottom">
        <span class="block text-sm text-gray-800">
          <InertiaLink href={route('register')}>Create new account</InertiaLink>
        </span>
        <LoadingButton type="submit" loading={sending} className="btn-gray">
          Login
        </LoadingButton>
      </div>
    </form>
  </div>
</div>
