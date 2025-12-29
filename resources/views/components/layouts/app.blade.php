<!DOCTYPE html>
<html lang="id" x-data="{
    theme: localStorage.getItem('theme') || 'light',
    init() {
        if (this.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    }
}" :class="{ 'dark': theme === 'dark' }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'InternFolio' }}</title>
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <script>
        // Prevent flash on page load
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body class="{{ $bodyClass ?? '' }} dark:bg-gray-900 transition-colors duration-300">

    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>

</html>
