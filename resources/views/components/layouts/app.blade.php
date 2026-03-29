@props([
    'bodyClass' => '',
    'title' => 'InternFolio',
    'ogTitle' => null,
    'ogDescription' => null,
    'ogImage' => null,
    'ogType' => 'website',
])

@php
    $metaTitle = $ogTitle ?? $title ?? 'InternFolio';
    $metaDescription = $ogDescription ?? 'InternFolio - Platform portofolio dan pengalaman alumni anak magang. Temukan proyek, tips, dan insight dari para alumni terbaik.';
    $metaImage = $ogImage ?? asset('image/logo.png');
    $metaUrl = url()->current();
@endphp

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
    <meta name="description" content="{{ $metaDescription }}">

    {{-- Open Graph Meta Tags --}}
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:url" content="{{ $metaUrl }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ $metaImage }}">
    <meta property="og:site_name" content="InternFolio">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $metaImage }}">

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
