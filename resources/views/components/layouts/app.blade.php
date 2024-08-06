<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <link rel="icon" type="image/jpg" href="/images/logo.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="https://unpkg.com/@alpinejs/ui@3.13.2-beta.0/dist/cdn.min.js"></script>

        @vite('resources/css/app.css')

        <title>{{ $title ?? 'ShopSphere' }}</title>
        @livewireStyles
    </head>

    <body class="pt-16">
        <livewire:nav />

        <div class="px-8 pb-3">
            {{ $slot }}
        </div>

        <livewire:footer />
        @livewireScripts
    </body>
</html>
