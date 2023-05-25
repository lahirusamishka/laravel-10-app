<script>
	import { Inertia } from "@inertiajs/inertia";
  import { InertiaLink } from "@inertiajs/inertia-svelte";
  const route = window.route;

  export let objects;
  export let objectName;
  export let user;
  export let sort;
  export let keys;

  import { compareValues } from "@/utils";
  let routeName = objectName + "s";
  $: sorted = objects ? objects.sort(compareValues(sort.value, sort.order)) : [];

  function sortBy(value) {
    sort.value = value;
  }

  function destroy(id) {
    if (confirm("Are you sure you want to delete this " + objectName + "?")) {
      Inertia.delete(route(routeName + ".destroy", id));
    }
	}

	function edit(id){
		Inertia.visit(route(routeName + ".edit", id));
	}
</script>


<div class="top-slot">
  <h1 class="font-bold block text-4xl">
    {routeName.charAt(0).toUpperCase() + routeName.slice(1)}
  </h1>
  {#if user.admin}
    <InertiaLink class="btn-gray" href={route(routeName + '.create')}>
      <span>Create</span>
      <span class="hidden md:inline">{objectName}</span>
    </InertiaLink>
  {/if}
</div>

<div class="table-container">
  <table class="index-table">
    <thead>
      <tr class="table-head">
        {#each keys as key}
          <th
            class="table-head-cell {sort.value === key.value ? 'table-head-cell-active' : ''}"
            on:click|preventDefault={() => (sort.value = key.value)}>
            {key.label}
          </th>
        {/each}
        {#if user.admin}
          <th class="table-head-cell">Actions</th>
        {/if}
      </tr>
    </thead>
    <tbody>
      {#if !sorted || sorted.length === 0}
        <tr>
          <td class="border-t px-6 py-4" colspan={user.admin ? '5' : '4'}>
            No {routeName} found.
          </td>
        </tr>
      {:else}
        {#each sorted as object}
          <tr
            class="table-row"
            on:click={() => Inertia.visit(route(routeName + '.show', object.id))}>
            {#each keys as { value, label }}
              <td class="border-t">
                <span class="table-cell">{object[value] || '-'}</span>
              </td>
            {/each}
            {#if user.admin}
              <td class="border-t">
                <span
									on:click|stopPropagation={edit(object.id)}
                  class="material-icons pl-6 pr-2">
                  create
                </span>
                <span
                  on:click|stopPropagation={destroy(object.id)}
                  class="material-icons">
                  clear
                </span>
              </td>
            {/if}
          </tr>
        {/each}
      {/if}
    </tbody>
  </table>
</div>

<style lang="scss" src="./css/table.scss"></style>
