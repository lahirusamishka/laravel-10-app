<script>
		import {InertiaLink} from '@inertiajs/inertia-svelte';
    export let icon;
    export let link;
    export let text;
    const route = window.route;
    let isActive = route().current(link + '*');
</script>

<div class="mb-4">
    <InertiaLink href={route(link)} class="flex items-center group py-3">
        <i class="mr-3 material-icons {isActive ? 'text-white' : 'text-gray-400 group-hover:text-gray-200'}">{icon}</i>
        <div class={isActive ? 'text-white' : 'text-gray-400 group-hover:text-gray-200'}>{text}</div>
    </InertiaLink>
</div>
