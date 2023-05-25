<script>
    export let loading;
    export let className = '';
    $: props = (({loading, className, ...rest}) => rest)($$props);
</script>

<button
    disabled={loading}
    class="flex items-center {className}"
    {...props}
>
    {#if loading}
        <div class="btn-spinner mr-2"/>
    {/if}
    <slot/>
</button>

<style lang="scss" src="./css/button.scss">
</style>
