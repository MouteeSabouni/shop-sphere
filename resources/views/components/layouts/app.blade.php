<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" type="image/jpg" href="/images/logo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="https://unpkg.com/@alpinejs/ui@3.13.2-beta.0/dist/cdn.min.js"></script>

        @vite('resources/css/app.css')

        <title>{{ $title ?? 'ShopSphere' }}</title>
    </head>
    <body>
        <div class="px-8 py-2">
            <livewire:navigation-bar />
        </div>
        <div class="px-8">
            {{ $slot }}
        </div>
        @livewireScripts
    </body>
</html>
