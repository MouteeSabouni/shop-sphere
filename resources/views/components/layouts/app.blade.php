<!DOCTYPE html>
<html lang="en" class="scroll-smooth no-scrollbar">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/jpg" href="/images/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

        <script defer src="https://unpkg.com/@alpinejs/ui@3.13.2-beta.0/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

        @vite('resources/css/app.css')

        <title>{{ $title ?? 'ShopSphere' }}</title>
        @livewireStyles
    </head>

    <body class="pt-[60px]">
        <livewire:nav />

        <div>
            {{ $slot }}
        </div>

        <livewire:footer />
        @livewireScripts
    </body>
</html>
