<div
    x-menu:items
    x-transition:enter.origin.top.right
    x-anchor.bottom-start="document.getElementById($id('alpine-menu-button'))"
    class="w-48 z-10 bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-md outline-none mt-2"
    x-cloak
>
    {{ $slot }}
</div>
