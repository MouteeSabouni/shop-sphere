<button
    type="button"
    x-menu:item
    x-bind:class="{
        'bg-slate-100 text-gray-900': $menuItem.isActive,
        'text-gray-600': ! $menuItem.isActive,
        'opacity-50 cursor-not-allowed': $menuItem.isDisabled,
    }"
    class="flex items-center gap-1 w-full py-2 px-3 text-left text-sm hover:bg-slate-100 disabled:text-gray-500 transition-colors"
    {{ $attributes }}
>
    {{ $slot }}
</button>
