<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-scroll">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ __('portfolio.hero.role') }} - {{ __('portfolio.hero.experience') }}">
    <meta name="author" content="{{ $developerData['name'] }} {{ $developerData['lastname'] }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $developerData['name'] }} {{ $developerData['lastname'] }} | {{ __('portfolio.hero.role') }}</title>

    {{-- Google Fonts: Syne (display) + DM Sans (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Devicons para iconos de tecnologias --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    {{-- Boxicons para iconos generales de UI --}}
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    {{-- Banderas iconos --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css"/>

    {{-- Estilos compilados por Vite desde resources/css/app.css --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- Pantalla de carga inicial --}}
    @include('components.preloader')

    {{-- Barra de navegacion principal --}}
    @include('components.nav')

    {{-- Menu de navegacion para moviles --}}
    @include('components.mobile-menu')

    {{-- Contenedor principal con scroll horizontal --}}
    <div id="app" role="main">
        <div id="pages-track">
            {{-- Las paginas se inyectan desde portfolio/index.blade.php --}}
            @yield('pages')
        </div>
    </div>

    {{-- Controles de navegacion horizontal --}}
    @include('components.nav-controls')

    {{-- Anime.js desde CDN, debe cargarse antes que app.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</body>

</html>
