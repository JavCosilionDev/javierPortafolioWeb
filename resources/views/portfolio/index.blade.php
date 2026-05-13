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

    <style>

        :root {
            /* Paleta de colores - tema oscuro con acento dorado-ambar */
            --color-bg:          #0a0a0f;
            --color-bg-alt:      #111118;
            --color-bg-card:     #16161e;
            --color-bg-glass:    rgba(30, 22, 22, 0.8);
            --color-border:      rgba(255, 255, 255, 0.07);
            --color-border-hover:rgba(255, 80, 80, 0.35);

            /* Colores de acento - dorado ambar */
            --color-accent:      #dc3545;
            --color-accent-dim:  rgba(245, 35, 35, 0.15);
            --color-accent-glow: rgba(245, 35, 35, 0.3);

            /* Tipografia */
            --color-text:        #e8e8f0;
            --color-text-muted:  #8888a0;
            --color-text-faint:  #55556a;

            /* Indicadores de nivel */
            --color-advanced:     #4ade80;
            --color-intermediate: #60a5fa;
            --color-basic:        #a78bfa;

            /* Estado de proyectos */
            --color-prod:        #4ade80;
            --color-personal:    #f58223;
            --color-completed:   #60a5fa;

            /* Tipografia - tamanios base */
            --font-display:      'Syne', sans-serif;
            --font-body:         'DM Sans', sans-serif;

            --text-xs:   0.75rem;
            --text-sm:   0.875rem;
            --text-base: 1rem;
            --text-lg:   1.125rem;
            --text-xl:   1.25rem;
            --text-2xl:  1.5rem;
            --text-3xl:  2rem;
            --text-4xl:  2.75rem;
            --text-5xl:  3.75rem;

            /* Espaciado - escala de 8px */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-10: 2.5rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-20: 5rem;

            /* Bordes redondeados */
            --radius-sm:   6px;
            --radius-md:   12px;
            --radius-lg:   20px;
            --radius-full: 9999px;

            /* Sombras */
            --shadow-card:  0 4px 24px rgba(0, 0, 0, 0.40);
            --shadow-glow:  0 0 40px rgba(245, 35, 35, 0.2);
            --shadow-heavy: 0 8px 40px rgba(0, 0, 0, 0.60);

            /* Transiciones */
            --transition-fast:   150ms ease;
            --transition-base:   250ms ease;
            --transition-slow:   400ms ease;

            /* Ancho maximo de contenido */
            --max-width: 1200px;
        }

        /* =============================================================
           RESET Y BASE
           ============================================================= */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            font-size: 16px;
            scroll-behavior: smooth;
        }

        html.no-scroll,
        html.no-scroll body {
            overflow: hidden;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--color-bg);
            color: var(--color-text);
            line-height: 1.6;
            min-height: 100vh;
            overflow: hidden; /* Solo scroll horizontal */
        }

        img {
            max-width: 100%;
            display: block;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: var(--font-body);
            cursor: pointer;
            border: none;
            background: none;
        }

        /* =============================================================
           PRELOADER
           Pantalla de carga inicial antes de mostrar el portafolio
           ============================================================= */
        #preloader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: var(--color-bg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-8);
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #preloader.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .preloader__monogram {
            font-family: var(--font-display);
            font-size: var(--text-5xl);
            font-weight: 800;
            color: var(--color-accent);
            letter-spacing: -2px;
            opacity: 0;
            /* La animacion la maneja anime.js */
        }

        .preloader__bar-wrap {
            width: 200px;
            height: 2px;
            background: var(--color-border);
            border-radius: var(--radius-full);
            overflow: hidden;
        }

        .preloader__bar {
            height: 100%;
            width: 0%;
            background: var(--color-accent);
            border-radius: var(--radius-full);
            /* La animacion la maneja anime.js */
        }

        .preloader__text {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            letter-spacing: 3px;
            text-transform: uppercase;
            opacity: 0;
        }

        /* =============================================================
           LAYOUT PRINCIPAL - Scroll horizontal
           Cada "pagina" ocupa el 100vw del viewport
           ============================================================= */
        #app {
            display: flex;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /*
         * Contenedor de paginas horizontales.
         * Se mueve via translateX con anime.js al navegar.
         */
        #pages-track {
            display: flex;
            width: max-content;
            height: 100vh;
            will-change: transform;
        }

        /*
         * Cada pagina individual.
         * Ocupa exactamente 100vw y 100vh.
         */
        .page {
            width: 100vw;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            flex-shrink: 0;
            scrollbar-width: thin;
            scrollbar-color: var(--color-accent-dim) transparent;
        }

        .page::-webkit-scrollbar {
            width: 4px;
        }

        .page::-webkit-scrollbar-track {
            background: transparent;
        }

        .page::-webkit-scrollbar-thumb {
            background: var(--color-accent-dim);
            border-radius: var(--radius-full);
        }

        /* =============================================================
           NAVEGACION PRINCIPAL
           Barra superior fija con logo, nav links y selector de idioma
           ============================================================= */
        #main-nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: var(--space-5) var(--space-8);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(10, 10, 15, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--color-border);
            transition: transform var(--transition-slow);
        }

        /* Monograma / Logo */
        .nav__logo {
            font-family: var(--font-display);
            font-size: var(--text-xl);
            font-weight: 800;
            color: var(--color-accent);
            letter-spacing: -0.5px;
            cursor: pointer;
            transition: opacity var(--transition-base);
        }

        .nav__logo:hover {
            opacity: 0.8;
        }

        /* Links de navegacion */
        .nav__links {
            display: flex;
            align-items: center;
            gap: var(--space-8);
            list-style: none;
        }

        .nav__link {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--color-text-muted);
            letter-spacing: 0.5px;
            cursor: pointer;
            padding: var(--space-2) 0;
            position: relative;
            transition: color var(--transition-base);
        }

        /* Linea de subrayado animada */
        .nav__link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--color-accent);
            transition: width var(--transition-base);
        }

        .nav__link:hover,
        .nav__link.active {
            color: var(--color-text);
        }

        .nav__link:hover::after,
        .nav__link.active::after {
            width: 100%;
        }

        /* Selector de idioma */
        .nav__lang {
            display: flex;
            align-items: center;
            gap: var(--space-1);
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-sm);
            overflow: hidden;
        }

        .nav__lang a {
            display: block;
            padding: var(--space-2) var(--space-3);
            font-size: var(--text-xs);
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--color-text-muted);
            transition: color var(--transition-base), background var(--transition-base);
        }

        .nav__lang a.active {
            color: var(--color-bg);
            background: var(--color-accent);
        }

        .nav__lang a:not(.active):hover {
            color: var(--color-text);
        }

        /* Separador entre idiomas */
        .nav__lang-sep {
            width: 1px;
            height: 20px;
            background: var(--color-border);
        }

        /* Boton hamburguesa para moviles */
        .nav__hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            padding: var(--space-2);
            cursor: pointer;
        }

        .nav__hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: var(--color-text);
            border-radius: var(--radius-full);
            transition: transform var(--transition-base), opacity var(--transition-base);
        }

        /* =============================================================
           FLECHAS DE NAVEGACION HORIZONTAL
           Botones para cambiar entre paginas/secciones
           ============================================================= */
        .nav-arrow {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            z-index: 200;
            width: 48px;
            height: 48px;
            border-radius: var(--radius-full);
            background: var(--color-bg-glass);
            border: 1px solid var(--color-border);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition:
                background var(--transition-base),
                border-color var(--transition-base),
                transform var(--transition-base),
                opacity var(--transition-base);
            color: var(--color-text-muted);
            font-size: var(--text-xl);
        }

        .nav-arrow:hover {
            background: var(--color-accent-dim);
            border-color: var(--color-accent);
            color: var(--color-accent);
            transform: translateY(-50%) scale(1.1);
        }

        .nav-arrow:disabled {
            opacity: 0.2;
            cursor: not-allowed;
            transform: translateY(-50%) scale(1);
        }

        .nav-arrow--prev { left: var(--space-6); }
        .nav-arrow--next { right: var(--space-6); }

        /* Indicadores de pagina (puntos) */
        .page-dots {
            position: fixed;
            bottom: var(--space-8);
            left: 50%;
            transform: translateX(-50%);
            z-index: 200;
            display: flex;
            gap: var(--space-3);
            align-items: center;
        }

        .page-dot {
            width: 8px;
            height: 8px;
            border-radius: var(--radius-full);
            background: var(--color-text-faint);
            cursor: pointer;
            transition:
                background var(--transition-base),
                width var(--transition-base),
                transform var(--transition-base);
        }

        .page-dot.active {
            background: var(--color-accent);
            width: 24px;
        }

        /* =============================================================
           PAGINA 0 - BIENVENIDA (HERO)
           Seccion principal con nombre, resumen y tecnologias
           ============================================================= */
        #page-home {
            background: var(--color-bg);
            position: relative;
            overflow: hidden;
        }

        /* Fondo decorativo - malla de gradiente */
        #page-home::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(245, 166, 35, 0.08) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        #page-home::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.05) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* Contenedor del hero con desplazamiento horizontal interno */
        .home__scroll-container {
            width: 100%;
            height: 100%;
            overflow-y: auto;
            padding-top: 80px; /* Espacio para la nav fija */
            position: relative;
            z-index: 1;
        }

        .home__inner {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: var(--space-16) var(--space-8) var(--space-20);
        }

        /* Seccion introductoria con nombre y titulo */
        .hero__intro {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: var(--space-12);
            align-items: start;
            margin-bottom: var(--space-16);
        }

        .hero__greeting {
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--color-accent);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: var(--space-4);
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        .hero__greeting::before {
            content: '';
            display: block;
            width: 32px;
            height: 1px;
            background: var(--color-accent);
        }

        .hero__name {
            font-family: var(--font-display);
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 800;
            color: var(--color-text);
            line-height: 1.05;
            letter-spacing: -2px;
            margin-bottom: var(--space-4);
        }

        .hero__name span {
            color: var(--color-accent);
        }

        .hero__title {
            font-size: var(--text-xl);
            color: var(--color-text-muted);
            font-weight: 400;
            margin-bottom: var(--space-6);
        }

        .hero__badges {
            display: flex;
            gap: var(--space-3);
            flex-wrap: wrap;
            margin-bottom: var(--space-8);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-4);
            background: var(--color-accent-dim);
            border: 1px solid var(--color-accent);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--color-accent);
            letter-spacing: 0.5px;
        }

        .badge--neutral {
            background: var(--color-bg-card);
            border-color: var(--color-border);
            color: var(--color-text-muted);
        }

        .hero__summary {
            font-size: var(--text-base);
            color: var(--color-text-muted);
            line-height: 1.8;
            max-width: 600px;
            margin-bottom: var(--space-10);
        }

        /* CTAs (botones de accion) */
        .hero__ctas {
            display: flex;
            gap: var(--space-4);
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-3) var(--space-6);
            border-radius: var(--radius-sm);
            font-size: var(--text-sm);
            font-weight: 600;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition:
                background var(--transition-base),
                color var(--transition-base),
                transform var(--transition-fast),
                box-shadow var(--transition-base);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn--primary {
            background: var(--color-accent);
            color: var(--color-bg);
            border: 1px solid var(--color-accent);
        }

        .btn--primary:hover {
            background: transparent;
            color: var(--color-accent);
            box-shadow: var(--shadow-glow);
        }

        .btn--outline {
            background: transparent;
            color: var(--color-text-muted);
            border: 1px solid var(--color-border);
        }

        .btn--outline:hover {
            border-color: var(--color-accent);
            color: var(--color-accent);
        }

        /* Card de avatar / disponibilidad */
        .hero__card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            min-width: 200px;
            text-align: center;
        }

        .hero__avatar {
            width: 80px;
            height: 80px;
            border-radius: var(--radius-full);
            background: var(--color-accent-dim);
            border: 2px solid var(--color-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: var(--text-2xl);
            font-weight: 800;
            color: var(--color-accent);
            margin: 0 auto var(--space-4);
        }

        .hero__status {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            font-size: var(--text-xs);
            color: var(--color-advanced);
            font-weight: 500;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: var(--radius-full);
            background: var(--color-advanced);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.8); }
        }

        /* =============================================================
           SECCION DE TECNOLOGIAS (dentro de la pagina home)
           ============================================================= */
        .section {
            margin-bottom: var(--space-16);
        }

        .section__header {
            margin-bottom: var(--space-8);
        }

        .section__label {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--color-accent);
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: var(--space-3);
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        .section__label::after {
            content: '';
            flex: 1;
            max-width: 40px;
            height: 1px;
            background: var(--color-accent);
        }

        .section__title {
            font-family: var(--font-display);
            font-size: var(--text-3xl);
            font-weight: 700;
            color: var(--color-text);
            letter-spacing: -1px;
        }

        .section__subtitle {
            font-size: var(--text-base);
            color: var(--color-text-muted);
            margin-top: var(--space-2);
        }

        /* Grid de tecnologias */
        .tech-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: var(--space-3);
        }

        .tech-item {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-md);
            padding: var(--space-4) var(--space-3);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-2);
            text-align: center;
            transition:
                border-color var(--transition-base),
                transform var(--transition-base),
                background var(--transition-base);
            cursor: default;
        }

        .tech-item:hover {
            border-color: var(--color-border-hover);
            background: var(--color-bg-alt);
            transform: translateY(-3px);
        }

        .tech-item i {
            font-size: 2rem;
        }

        .tech-item__name {
            font-size: var(--text-xs);
            font-weight: 500;
            color: var(--color-text-muted);
        }

        .tech-item__level {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 2px 8px;
            border-radius: var(--radius-full);
        }

        .tech-item__level--advanced {
            color: var(--color-advanced);
            background: rgba(74, 222, 128, 0.10);
        }

        .tech-item__level--intermediate {
            color: var(--color-intermediate);
            background: rgba(96, 165, 250, 0.10);
        }

        .tech-item__level--basic {
            color: var(--color-basic);
            background: rgba(167, 139, 250, 0.10);
        }

        /* Grid de herramientas */
        .tools-list {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-3);
        }

        .tool-chip {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-4);
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-full);
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            transition: border-color var(--transition-base), color var(--transition-base);
        }

        .tool-chip:hover {
            border-color: var(--color-border-hover);
            color: var(--color-text);
        }

        .tool-chip i {
            font-size: var(--text-lg);
        }

        /* =============================================================
           FORMACION ACADEMICA
           ============================================================= */
        .education-card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            display: flex;
            gap: var(--space-6);
            align-items: flex-start;
            transition: border-color var(--transition-base);
        }

        .education-card:hover {
            border-color: var(--color-border-hover);
        }

        .education-card__icon {
            width: 52px;
            height: 52px;
            background: var(--color-accent-dim);
            border: 1px solid var(--color-accent);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-accent);
            font-size: var(--text-2xl);
            flex-shrink: 0;
        }

        .education-card__degree {
            font-family: var(--font-display);
            font-size: var(--text-xl);
            font-weight: 700;
            color: var(--color-text);
            margin-bottom: var(--space-2);
        }

        .education-card__institution {
            font-size: var(--text-base);
            color: var(--color-accent);
            margin-bottom: var(--space-2);
        }

        .education-card__meta {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            display: flex;
            flex-direction: column;
            gap: var(--space-1);
        }

        /* =============================================================
           EXPERIENCIA - Timeline compacto
           ============================================================= */
        .experience-timeline {
            position: relative;
            padding-left: var(--space-8);
        }

        .experience-timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            bottom: 8px;
            width: 1px;
            background: var(--color-border);
        }

        .exp-item {
            position: relative;
            padding-bottom: var(--space-8);
        }

        .exp-item::before {
            content: '';
            position: absolute;
            left: calc(-2rem - 4px);
            top: 8px;
            width: 9px;
            height: 9px;
            border-radius: var(--radius-full);
            background: var(--color-accent);
            border: 2px solid var(--color-bg);
            box-shadow: 0 0 0 2px var(--color-accent);
        }

        .exp-item:last-child {
            padding-bottom: 0;
        }

        .exp-item__period {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--color-accent);
            letter-spacing: 0.5px;
            margin-bottom: var(--space-1);
        }

        .exp-item__company {
            font-family: var(--font-display);
            font-size: var(--text-lg);
            font-weight: 700;
            color: var(--color-text);
        }

        .exp-item__role {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            margin-bottom: var(--space-2);
        }

        .exp-item__summary {
            font-size: var(--text-sm);
            color: var(--color-text-faint);
            line-height: 1.7;
        }

        /* =============================================================
           GRID DE DOS COLUMNAS para seccion home
           ============================================================= */
        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-12);
        }

        /* =============================================================
           PAGINA 1 - PROYECTOS
           ============================================================= */
        #page-projects {
            background: var(--color-bg-alt);
        }

        .projects__inner {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: calc(80px + var(--space-12)) var(--space-8) var(--space-20);
        }

        /* Filtros de categoria */
        .projects__filters {
            display: flex;
            gap: var(--space-2);
            flex-wrap: wrap;
            margin-bottom: var(--space-10);
        }

        .filter-btn {
            padding: var(--space-2) var(--space-5);
            border-radius: var(--radius-full);
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--color-text-muted);
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            cursor: pointer;
            transition:
                background var(--transition-base),
                color var(--transition-base),
                border-color var(--transition-base);
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--color-accent-dim);
            color: var(--color-accent);
            border-color: var(--color-accent);
        }

        /*
         * Contenedor de proyectos.
         * Usa un layout mixto: las tarjetas 'featured' son mas anchas.
         */
        .projects__grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: var(--space-6);
        }

        /* ---- Plantilla 1: Featured Card (tarjeta grande destacada) ---- */
        .project-featured {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: var(--space-8);
            grid-column: span 2;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: var(--space-8);
            align-items: start;
            transition:
                border-color var(--transition-base),
                box-shadow var(--transition-base),
                transform var(--transition-slow);
            position: relative;
            overflow: hidden;
        }

        /* Acento de color en el borde izquierdo */
        .project-featured::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--color-accent);
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
        }

        .project-featured:hover {
            border-color: var(--color-border-hover);
            box-shadow: var(--shadow-glow);
            transform: translateY(-4px);
        }

        .project-featured__tag {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--color-accent);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: var(--space-3);
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }

        .project-featured__title {
            font-family: var(--font-display);
            font-size: var(--text-2xl);
            font-weight: 700;
            color: var(--color-text);
            letter-spacing: -0.5px;
            margin-bottom: var(--space-4);
        }

        .project-featured__desc {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            line-height: 1.8;
            margin-bottom: var(--space-6);
        }

        .project-featured__meta {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: var(--space-4);
            min-width: 160px;
        }

        .project-status {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-3);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            font-weight: 600;
        }

        .project-status--prod {
            background: rgba(74, 222, 128, 0.10);
            color: var(--color-prod);
            border: 1px solid rgba(74, 222, 128, 0.25);
        }

        .project-status--personal {
            background: rgba(245, 166, 35, 0.10);
            color: var(--color-personal);
            border: 1px solid rgba(245, 166, 35, 0.25);
        }

        .project-status--completed {
            background: rgba(96, 165, 250, 0.10);
            color: var(--color-completed);
            border: 1px solid rgba(96, 165, 250, 0.25);
        }

        .project-status__dot {
            width: 6px;
            height: 6px;
            border-radius: var(--radius-full);
            background: currentColor;
        }

        /* Tags de tecnologias */
        .tech-tags {
            display: flex;
            flex-wrap: wrap;
            gap: var(--space-2);
        }

        .tech-tag {
            padding: var(--space-1) var(--space-3);
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-full);
            font-size: var(--text-xs);
            color: var(--color-text-muted);
        }

        /* Botones de accion del proyecto */
        .project-actions {
            display: flex;
            gap: var(--space-3);
            flex-wrap: wrap;
            margin-top: var(--space-6);
        }

        .btn--sm {
            padding: var(--space-2) var(--space-4);
            font-size: var(--text-xs);
        }

        /* ---- Plantilla 2: Card normal (grid) ---- */
        .project-card {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: var(--space-6);
            display: flex;
            flex-direction: column;
            gap: var(--space-4);
            transition:
                border-color var(--transition-base),
                transform var(--transition-slow);
        }

        .project-card:hover {
            border-color: var(--color-border-hover);
            transform: translateY(-4px);
        }

        .project-card__header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .project-card__category {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--color-text-muted);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .project-card__title {
            font-family: var(--font-display);
            font-size: var(--text-xl);
            font-weight: 700;
            color: var(--color-text);
            letter-spacing: -0.3px;
        }

        .project-card__desc {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            line-height: 1.7;
            flex: 1;
        }

        /* ---- Plantilla 3: Timeline card ---- */
        .project-timeline-wrap {
            grid-column: 1 / -1;
        }

        .timeline-list {
            display: flex;
            flex-direction: column;
            gap: 0;
            position: relative;
            padding-left: var(--space-10);
        }

        .timeline-list::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 12px;
            bottom: 12px;
            width: 1px;
            background: linear-gradient(to bottom, var(--color-accent), transparent);
        }

        .timeline-project {
            position: relative;
            padding: var(--space-5) var(--space-6);
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-md);
            margin-bottom: var(--space-4);
            transition: border-color var(--transition-base);
        }

        .timeline-project::before {
            content: '';
            position: absolute;
            left: calc(-2.5rem + 2px);
            top: 50%;
            transform: translateY(-50%);
            width: 10px;
            height: 10px;
            border-radius: var(--radius-full);
            background: var(--color-accent);
            border: 2px solid var(--color-bg-alt);
        }

        .timeline-project:hover {
            border-color: var(--color-border-hover);
        }

        .timeline-project__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--space-2);
        }

        .timeline-project__title {
            font-family: var(--font-display);
            font-size: var(--text-lg);
            font-weight: 600;
            color: var(--color-text);
        }

        .timeline-project__period {
            font-size: var(--text-xs);
            color: var(--color-accent);
            font-weight: 600;
        }

        .timeline-project__company {
            font-size: var(--text-sm);
            color: var(--color-text-muted);
            margin-bottom: var(--space-2);
        }

        .timeline-project__desc {
            font-size: var(--text-sm);
            color: var(--color-text-faint);
            line-height: 1.7;
        }

        /* =============================================================
           PAGINA 2 - CONTACTO
           ============================================================= */
        #page-contact {
            background: var(--color-bg);
            position: relative;
        }

        #page-contact::before {
            content: '';
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 166, 35, 0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        .contact__inner {
            max-width: 700px;
            margin: 0 auto;
            padding: calc(80px + var(--space-16)) var(--space-8) var(--space-20);
            position: relative;
            z-index: 1;
        }

        .contact__available {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-5);
            background: rgba(74, 222, 128, 0.08);
            border: 1px solid rgba(74, 222, 128, 0.25);
            border-radius: var(--radius-full);
            font-size: var(--text-sm);
            color: var(--color-advanced);
            font-weight: 500;
            margin-bottom: var(--space-8);
        }

        .contact__grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-4);
            margin-top: var(--space-10);
        }

        .contact-item {
            background: var(--color-bg-card);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-lg);
            padding: var(--space-4);
            display: flex;
            align-items: flex-start;
            gap: var(--space-4);
            transition:
                border-color var(--transition-base),
                transform var(--transition-slow);
        }

        .contact-item:hover {
            border-color: var(--color-border-hover);
            transform: translateY(-3px);
        }

        /* Un item puede ocupar el ancho completo */
        .contact-item--full {
            grid-column: 1 / -1;
        }

        .contact-item__icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            background: var(--color-accent-dim);
            border: 1px solid var(--color-accent);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--color-accent);
            font-size: var(--text-xl);
            flex-shrink: 0;
        }

        .contact-item__label {
            font-size: var(--text-xs);
            font-weight: 600;
            color: var(--color-text-muted);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: var(--space-1);
        }

        .contact-item__value {
            font-size: var(--text-base);
            font-weight: 500;
            color: var(--color-text);
            word-break: break-all;
        }

        .contact-item__value a {
            color: var(--color-accent);
            transition: opacity var(--transition-base);
        }

        .contact-item__value a:hover {
            opacity: 0.7;
        }

        /* =============================================================
           FOOTER
           ============================================================= */
        .footer {
            padding: var(--space-6) var(--space-8);
            border-top: 1px solid var(--color-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: var(--text-xs);
            color: var(--color-text-faint);
        }

        .footer__heart {
            color: #ef4444;
            display: inline;
        }

        .footer__links {
            display: flex;
            gap: var(--space-4);
        }

        .footer__links a {
            color: var(--color-text-faint);
            font-size: var(--text-xl);
            transition: color var(--transition-base), transform var(--transition-base);
            display: inline-block;
        }

        .footer__links a:hover {
            color: var(--color-accent);
            transform: translateY(-2px);
        }

        /* =============================================================
           MENU MOVIL
           ============================================================= */
        .nav__mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 99;
            background: rgba(10, 10, 15, 0.97);
            backdrop-filter: blur(20px);
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-8);
        }

        .nav__mobile-menu.open {
            display: flex;
        }

        .nav__mobile-link {
            font-family: var(--font-display);
            font-size: var(--text-3xl);
            font-weight: 700;
            color: var(--color-text-muted);
            cursor: pointer;
            transition: color var(--transition-base);
        }

        .nav__mobile-link:hover {
            color: var(--color-accent);
        }

        .nav__mobile-close {
            position: absolute;
            top: var(--space-6);
            right: var(--space-8);
            font-size: var(--text-3xl);
            color: var(--color-text-muted);
            cursor: pointer;
            background: none;
            border: none;
            transition: color var(--transition-base);
        }

        .nav__mobile-close:hover {
            color: var(--color-text);
        }

        /* =============================================================
           RESPONSIVE - Tablets y moviles
           ============================================================= */

        /* Tablets grandes (max 1024px) */
        @media (max-width: 1024px) {
            .project-featured {
                grid-column: span 1;
                grid-template-columns: 1fr;
            }

            .project-featured__meta {
                align-items: flex-start;
                flex-direction: row;
                flex-wrap: wrap;
                min-width: unset;
            }

            .two-col {
                grid-template-columns: 1fr;
            }
        }

        /* Tablets pequenas (max 768px) */
        @media (max-width: 768px) {
            :root {
                --text-5xl: 2.75rem;
                --text-4xl: 2.25rem;
                --text-3xl: 1.75rem;
            }

            /* Oculta links de nav en movil */
            .nav__links {
                display: none;
            }

            .nav__hamburger {
                display: flex;
            }

            /* Oculta el selector de idioma en la nav en movil */
            .nav__lang {
                display: none;
            }

            .hero__intro {
                grid-template-columns: 1fr;
            }

            .hero__card {
                display: none;
            }

            .projects__grid {
                grid-template-columns: 1fr;
            }

            .project-featured {
                grid-column: span 1;
            }

            .contact__grid {
                grid-template-columns: 1fr;
            }

            .nav-arrow {
                width: 40px;
                height: 40px;
                font-size: var(--text-base);
            }

            .nav-arrow--prev { left: var(--space-3); }
            .nav-arrow--next { right: var(--space-3); }

            .home__inner,
            .projects__inner,
            .contact__inner {
                padding-left: var(--space-5);
                padding-right: var(--space-5);
            }
        }

        /* Moviles pequenos (max 480px) */
        @media (max-width: 480px) {
            :root {
                --text-5xl: 2.25rem;
            }

            .hero__ctas {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .tech-grid {
                grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            }

            .page-dots {
                bottom: var(--space-4);
            }

            .footer {
                flex-direction: column;
                gap: var(--space-4);
                text-align: center;
            }
        }

        /* =============================================================
           UTILIDADES
           ============================================================= */
        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
        }

        /* Clase para ocultar elementos filtrados */
        .project-hidden {
            display: none !important;
        }

        /* Clase de animacion de entrada */
        .anim-ready {
            opacity: 0;
            transform: translateY(20px);
        }
    </style>
</head>

<body>
    {{-- ============================================================
         PRELOADER
         Se muestra mientras carga la pagina, luego desaparece
         ============================================================ --}}
    <div id="preloader" role="status" aria-label="{{ __('portfolio.preloader.loading') }}">
        <div class="preloader__monogram" aria-hidden="true">
            {{ strtoupper(substr($developerData['name'], 0, 1)) }}{{ strtoupper(substr($developerData['lastname'], 0, 1)) }}
        </div>
        <div class="preloader__bar-wrap" aria-hidden="true">
            <div class="preloader__bar" id="preloader-bar"></div>
        </div>
        <p class="preloader__text" aria-hidden="true">{{ __('portfolio.preloader.loading') }}</p>
    </div>

    {{-- ============================================================
         NAVEGACION PRINCIPAL
         Fija en la parte superior, visible en todas las paginas
         ============================================================ --}}
    <nav id="main-nav" role="navigation" aria-label="Navegacion principal">

        {{-- Logo / Monograma --}}
        <div class="nav__logo" onclick="goToPage(0)" aria-label="Ir al inicio">
            {{ strtoupper(substr($developerData['name'], 0, 1)) }}.{{ strtoupper(substr($developerData['lastname'], 0, 1)) }}
        </div>

        {{-- Links de navegacion desktop --}}
        <ul class="nav__links" role="list">
            <li>
                <span class="nav__link active" onclick="goToPage(0)" data-page="0" role="button" tabindex="0">
                    {{ __('portfolio.nav.home') }}
                </span>
            </li>
            <li>
                <span class="nav__link" onclick="goToPage(1)" data-page="1" role="button" tabindex="0">
                    {{ __('portfolio.nav.projects') }}
                </span>
            </li>
            <li>
                <span class="nav__link" onclick="goToPage(2)" data-page="2" role="button" tabindex="0">
                    {{ __('portfolio.nav.contact') }}
                </span>
            </li>
        </ul>

        {{-- Selector de idioma --}}
        <div class="nav__lang" role="group" aria-label="Seleccionar idioma">
            <a href="{{ route('language.switch', 'es') }}"
               class="{{ app()->getLocale() === 'es' ? 'active' : '' }}"
               aria-label="Cambiar a Espanol Mexico"
               aria-current="{{ app()->getLocale() === 'es' ? 'true' : 'false' }}">
                <span class="fi fi-mx fis"></span> ES
            </a>
            <span class="nav__lang-sep" aria-hidden="true"></span>
            <a href="{{ route('language.switch', 'en') }}"
               class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"
               aria-label="Switch to English US"
               aria-current="{{ app()->getLocale() === 'en' ? 'true' : 'false' }}">
                <span class="fi fi-us"></span> EN
            </a>
        </div>

        {{-- Boton hamburguesa para moviles --}}
        <button class="nav__hamburger" id="nav-hamburger"
                aria-label="Abrir menu de navegacion"
                aria-expanded="false"
                aria-controls="mobile-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    {{-- Menu movil (oculto por defecto) --}}
    <div class="nav__mobile-menu" id="mobile-menu" role="dialog" aria-label="Menu de navegacion" aria-modal="true">
        <button class="nav__mobile-close" id="mobile-menu-close" aria-label="Cerrar menu">
            <i class="bx bx-x"></i>
        </button>

        {{-- Selector de idioma en menu movil --}}
        <div class="nav__lang" style="margin-bottom: 1rem;">
            <a href="{{ route('language.switch', 'es') }}"
               class="{{ app()->getLocale() === 'es' ? 'active' : '' }}">ES</a>
            <span class="nav__lang-sep" aria-hidden="true"></span>
            <a href="{{ route('language.switch', 'en') }}"
               class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
        </div>

        <span class="nav__mobile-link" onclick="goToPage(0); closeMobileMenu();">
            {{ __('portfolio.nav.home') }}
        </span>
        <span class="nav__mobile-link" onclick="goToPage(1); closeMobileMenu();">
            {{ __('portfolio.nav.projects') }}
        </span>
        <span class="nav__mobile-link" onclick="goToPage(2); closeMobileMenu();">
            {{ __('portfolio.nav.contact') }}
        </span>
    </div>

    {{-- ============================================================
         CONTENEDOR PRINCIPAL - Scroll horizontal
         ============================================================ --}}
    <div id="app" role="main">

        {{-- Track de paginas: se mueve via translateX --}}
        <div id="pages-track">

            {{-- ========================================================
                 PAGINA 0: BIENVENIDA
                 Presenta al desarrollador con resumen completo
                 ======================================================== --}}
            <section id="page-home" class="page" aria-label="{{ __('portfolio.nav.home') }}">
                <div class="home__scroll-container">
                    <div class="home__inner">

                        {{-- --- HERO: Nombre, titulo, CTA --- --}}
                        <div class="hero__intro">
                            <div>
                                <p class="hero__greeting anim-ready">{{ __('portfolio.hero.greeting') }}</p>
                                <h1 class="hero__name anim-ready">
                                    {{ $developerData['name'] }}
                                    <span>{{ $developerData['lastname'] }}</span>
                                </h1>
                                <p class="hero__title anim-ready">{{ __('portfolio.hero.role') }}</p>
                                <div class="hero__badges anim-ready">
                                    <span class="badge">{{ $developerData['level'] }}</span>
                                    <span class="badge badge--neutral">
                                        <i class="bx bx-time-five" aria-hidden="true"></i>
                                        +{{ $developerData['years_exp'] }} {{ app()->getLocale() === 'es' ? 'años de exp.' : 'years exp.' }}
                                    </span>
                                    <span class="badge badge--neutral">
                                        <i class="bx bx-map-pin" aria-hidden="true"></i>
                                        {{ $developerData['location_' . app()->getLocale()] }}
                                    </span>
                                </div>
                                <p class="hero__summary anim-ready">{{ __('portfolio.hero.summary') }}</p>
                                <div class="hero__ctas anim-ready">
                                    <button class="btn btn--primary" onclick="goToPage(1)" aria-label="{{ __('portfolio.hero.cta_projects') }}">
                                        <i class="bx bx-grid-alt" aria-hidden="true"></i>
                                        {{ __('portfolio.hero.cta_projects') }}
                                    </button>
                                    <button class="btn btn--outline" onclick="goToPage(2)" aria-label="{{ __('portfolio.hero.cta_contact') }}">
                                        <i class="bx bx-envelope" aria-hidden="true"></i>
                                        {{ __('portfolio.hero.cta_contact') }}
                                    </button>
                                </div>
                            </div>

                            {{-- Card lateral con estado de disponibilidad --}}
                            <div class="hero__card anim-ready" aria-label="Estado de disponibilidad">
                                <div class="hero__avatar" aria-hidden="true">
                                    {{ strtoupper(substr($developerData['name'], 0, 1)) }}
                                </div>
                                <p style="font-size: var(--text-sm); color: var(--color-text-muted); margin-bottom: var(--space-3);">
                                    {{ $developerData['name'] }} {{ $developerData['lastname'] }}
                                </p>
                                <div class="hero__status">
                                    <span class="status-dot" aria-hidden="true"></span>
                                    {{ __('portfolio.contact.available') }}
                                </div>
                            </div>
                        </div>

                        {{-- --- SECCION: Tecnologias de programacion --- --}}
                        <div class="section" id="section-tech">
                            <div class="section__header">
                                <p class="section__label">{{ __('portfolio.tech.title') }}</p>
                                <h2 class="section__title">{{ __('portfolio.tech.subtitle') }}</h2>
                            </div>

                            {{-- Lenguajes de programacion --}}
                            <p style="font-size: var(--text-sm); font-weight: 600; color: var(--color-text-muted); margin-bottom: var(--space-4); letter-spacing: 1px; text-transform: uppercase;">
                                {{ __('portfolio.tech.languages') }}
                            </p>
                            <div class="tech-grid" style="margin-bottom: var(--space-8);" aria-label="{{ __('portfolio.tech.languages') }}">
                                @php
                                $locale = app()->getLocale();
                                $levels = [
                                    'advanced'     => __('portfolio.tech.level.advanced'),
                                    'intermediate' => __('portfolio.tech.level.intermediate'),
                                    'basic'        => __('portfolio.tech.level.basic'),
                                ];
                                $languages = [
                                    ['name' => 'PHP',        'icon' => 'devicon-php-plain colored',        'level' => 'advanced'],
                                    ['name' => 'JavaScript', 'icon' => 'devicon-javascript-plain colored', 'level' => 'intermediate'],
                                    ['name' => 'Python',     'icon' => 'devicon-python-plain colored',     'level' => 'intermediate'],
                                    ['name' => 'Dart',       'icon' => 'devicon-dart-plain colored',       'level' => 'intermediate'],
                                    ['name' => 'TypeScript', 'icon' => 'devicon-typescript-plain colored', 'level' => 'basic'],
                                    ['name' => 'HTML5',      'icon' => 'devicon-html5-plain colored',      'level' => 'advanced'],
                                    ['name' => 'CSS3',       'icon' => 'devicon-css3-plain colored',       'level' => 'advanced'],
                                    ['name' => 'C#',         'icon' => 'devicon-csharp-plain colored',     'level' => 'intermediate'],
                                    ['name' => 'C++',        'icon' => 'devicon-cplusplus-plain colored',  'level' => 'intermediate'],
                                ];
                                @endphp

                                @foreach($languages as $lang)
                                <div class="tech-item anim-ready">
                                    <i class="{{ $lang['icon'] }}" aria-hidden="true"></i>
                                    <span class="tech-item__name">{{ $lang['name'] }}</span>
                                    <span class="tech-item__level tech-item__level--{{ $lang['level'] }}">
                                        {{ $levels[$lang['level']] }}
                                    </span>
                                </div>
                                @endforeach
                            </div>

                            {{-- Frameworks --}}
                            <p style="font-size: var(--text-sm); font-weight: 600; color: var(--color-text-muted); margin-bottom: var(--space-4); letter-spacing: 1px; text-transform: uppercase;">
                                {{ __('portfolio.tech.frameworks') }}
                            </p>
                            <div class="tech-grid" style="margin-bottom: var(--space-8);" aria-label="{{ __('portfolio.tech.frameworks') }}">
                                @php
                                $frameworks = [
                                    ['name' => 'Laravel',   'icon' => 'devicon-laravel-plain colored',    'level' => 'intermediate'],
                                    ['name' => 'Flutter',   'icon' => 'devicon-flutter-plain colored',    'level' => 'intermediate'],
                                    ['name' => 'Django',    'icon' => 'devicon-django-plain colored',     'level' => 'basic'],
                                    ['name' => 'Bootstrap', 'icon' => 'devicon-bootstrap-plain colored',  'level' => 'advanced'],
                                    ['name' => 'jQuery',    'icon' => 'devicon-jquery-plain colored',     'level' => 'intermediate'],
                                    ['name' => 'NestJS',    'icon' => 'devicon-nestjs-plain colored',     'level' => 'basic'],
                                    ['name' => '.NET',      'icon' => 'devicon-dot-net-plain colored',    'level' => 'intermediate'],
                                    ['name' => 'Angular',   'icon' => 'devicon-angularjs-plain colored',  'level' => 'basic'],
                                ];
                                @endphp

                                @foreach($frameworks as $fw)
                                <div class="tech-item anim-ready">
                                    <i class="{{ $fw['icon'] }}" aria-hidden="true"></i>
                                    <span class="tech-item__name">{{ $fw['name'] }}</span>
                                    <span class="tech-item__level tech-item__level--{{ $fw['level'] }}">
                                        {{ $levels[$fw['level']] }}
                                    </span>
                                </div>
                                @endforeach
                            </div>

                            {{-- Bases de datos --}}
                            <p style="font-size: var(--text-sm); font-weight: 600; color: var(--color-text-muted); margin-bottom: var(--space-4); letter-spacing: 1px; text-transform: uppercase;">
                                {{ __('portfolio.tech.databases') }}
                            </p>
                            <div class="tech-grid" aria-label="{{ __('portfolio.tech.databases') }}">
                                @php
                                $databases = [
                                    ['name' => 'MySQL',      'icon' => 'devicon-mysql-plain colored',      'level' => 'advanced'],
                                    ['name' => 'PostgreSQL', 'icon' => 'devicon-postgresql-plain colored', 'level' => 'intermediate'],
                                    ['name' => 'TypeORM',    'icon' => 'devicon-sequelize-plain colored',  'level' => 'intermediate'],
                                ];
                                @endphp

                                @foreach($databases as $db)
                                <div class="tech-item anim-ready">
                                    <i class="{{ $db['icon'] }}" aria-hidden="true"></i>
                                    <span class="tech-item__name">{{ $db['name'] }}</span>
                                    <span class="tech-item__level tech-item__level--{{ $db['level'] }}">
                                        {{ $levels[$db['level']] }}
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- --- SECCION: Herramientas y Software --- --}}
                        <div class="section" id="section-tools">
                            <div class="section__header">
                                <p class="section__label">{{ __('portfolio.tools.title') }}</p>
                                <h2 class="section__title">{{ __('portfolio.tools.subtitle') }}</h2>
                            </div>

                            <p style="font-size: var(--text-sm); font-weight: 600; color: var(--color-text-muted); margin-bottom: var(--space-4); letter-spacing: 1px; text-transform: uppercase;">
                                {{ __('portfolio.tools.main') }}
                            </p>
                            <div class="tools-list" style="margin-bottom: var(--space-8);" aria-label="{{ __('portfolio.tools.main') }}">
                                @php
                                $mainTools = [
                                    ['name' => 'VS Code',   'icon' => 'devicon-vscode-plain colored'],
                                    ['name' => 'Postman',   'icon' => 'bx bx-send'],
                                    ['name' => 'Git',       'icon' => 'devicon-git-plain colored'],
                                    ['name' => 'GitHub',    'icon' => 'devicon-github-original'],
                                    ['name' => 'Bitbucket', 'icon' => 'devicon-bitbucket-original colored'],
                                    ['name' => 'Draw.io',   'icon' => 'bx bx-shape-square'],
                                    ['name' => 'Figma',     'icon' => 'devicon-figma-plain colored'],
                                    ['name' => 'ExcelJS',   'icon' => 'bx bx-table'],
                                    ['name' => 'jsPDF',     'icon' => 'bx bxs-file-pdf'],
                                    ['name' => 'XAMPP',     'icon' => 'bx bx-server'],
                                    ['name' => 'Notion',    'icon' => 'bx bx-note'],
                                    ['name' => 'Trello',    'icon' => 'devicon-trello-plain colored'],
                                ];
                                @endphp

                                @foreach($mainTools as $tool)
                                <span class="tool-chip anim-ready">
                                    <i class="{{ $tool['icon'] }}" aria-hidden="true"></i>
                                    {{ $tool['name'] }}
                                </span>
                                @endforeach
                            </div>

                            <p style="font-size: var(--text-sm); font-weight: 600; color: var(--color-text-muted); margin-bottom: var(--space-4); letter-spacing: 1px; text-transform: uppercase;">
                                {{ __('portfolio.tools.cloud') }}
                            </p>
                            <div class="tools-list" aria-label="{{ __('portfolio.tools.cloud') }}">
                                @php
                                $cloudTools = [
                                    ['name' => 'Docker',         'icon' => 'devicon-docker-plain colored'],
                                    ['name' => 'Microsoft Azure', 'icon' => 'devicon-azure-plain colored'],
                                    ['name' => 'AWS',            'icon' => 'devicon-amazonwebservices-original colored'],
                                    ['name' => 'pgAdmin',        'icon' => 'devicon-postgresql-plain colored'],
                                    ['name' => 'n8n',            'icon' => 'bx bx-bot'],
                                    ['name' => 'AI Tools',       'icon' => 'bx bx-brain'],
                                ];
                                @endphp

                                @foreach($cloudTools as $tool)
                                <span class="tool-chip anim-ready">
                                    <i class="{{ $tool['icon'] }}" aria-hidden="true"></i>
                                    {{ $tool['name'] }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        {{-- --- Grid: Formacion y Experiencia --- --}}
                        <div class="two-col">

                            {{-- Formacion Academica --}}
                            <div class="section" id="section-education">
                                <div class="section__header">
                                    <p class="section__label">{{ __('portfolio.education.title') }}</p>
                                    <h2 class="section__title">{{ __('portfolio.education.subtitle') }}</h2>
                                </div>

                                <div class="education-card anim-ready">
                                    <div class="education-card__icon" aria-hidden="true">
                                        <i class="bx bxs-graduation"></i>
                                    </div>
                                    <div>
                                        <p class="education-card__degree">{{ __('portfolio.education.degree') }}</p>
                                        <p class="education-card__institution">{{ __('portfolio.education.institution') }}</p>
                                        <div class="education-card__meta">
                                            <span>
                                                <i class="bx bx-calendar" aria-hidden="true"></i>
                                                {{ __('portfolio.education.period') }}
                                            </span>
                                            <span>
                                                <i class="bx bxs-id-card" aria-hidden="true"></i>
                                                {{ __('portfolio.education.license') }}
                                            </span>
                                            <span>
                                                <i class="bx bxs-file" aria-hidden="true"></i>
                                                {{ __('portfolio.education.degree_doc') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Habilidades blandas --}}
                                <div style="margin-top: var(--space-8);">
                                    <p class="section__label" style="margin-bottom: var(--space-4);">
                                        {{ __('portfolio.skills.soft') }}
                                    </p>
                                    <ul style="list-style: none; display: flex; flex-direction: column; gap: var(--space-3);">
                                        @foreach(__('portfolio.skills.soft_items') as $skill)
                                        <li class="anim-ready" style="display: flex; align-items: flex-start; gap: var(--space-3); font-size: var(--text-sm); color: var(--color-text-muted);">
                                            <i class="bx bx-check" style="color: var(--color-accent); font-size: 1.1rem; flex-shrink: 0; margin-top: 2px;" aria-hidden="true"></i>
                                            {{ $skill }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- Experiencia laboral --}}
                            <div class="section" id="section-experience">
                                <div class="section__header">
                                    <p class="section__label">{{ __('portfolio.experience.title') }}</p>
                                    <h2 class="section__title">{{ __('portfolio.experience.subtitle') }}</h2>
                                </div>

                                <div class="experience-timeline" role="list" aria-label="{{ __('portfolio.experience.title') }}">
                                    @foreach(__('portfolio.experience.roles') as $role)
                                    <div class="exp-item anim-ready" role="listitem">
                                        <p class="exp-item__period">{{ $role['period'] }}</p>
                                        <p class="exp-item__company">{{ $role['company'] }}</p>
                                        <p class="exp-item__role">{{ $role['role'] }}</p>
                                        <p class="exp-item__summary">{{ $role['summary'] }}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>{{-- /two-col --}}

                        {{-- Footer de la pagina home --}}
                        <footer class="footer" role="contentinfo">
                            <span>
                                &copy; {{ date('Y') }} {{ $developerData['name'] }} {{ $developerData['lastname'] }}.
                                {{ __('portfolio.footer.rights') }}
                            </span>
                            <div class="footer__links" aria-label="Redes sociales">
                                <a href="{{ $developerData['github'] }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                                    <i class="bx bxl-github" aria-hidden="true"></i>
                                </a>
                                <a href="{{ $developerData['linkedin'] }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                                    <i class="bx bxl-linkedin" aria-hidden="true"></i>
                                </a>
                            </div>
                        </footer>

                    </div>{{-- /home__inner --}}
                </div>{{-- /home__scroll-container --}}
            </section>{{-- /page-home --}}

            {{-- ========================================================
                 PAGINA 1: PROYECTOS
                 Tres plantillas: featured, card, timeline
                 ======================================================== --}}
            <section id="page-projects" class="page" aria-label="{{ __('portfolio.nav.projects') }}">
                <div class="projects__inner">

                    {{-- Encabezado de la pagina --}}
                    <div class="section__header" style="margin-bottom: var(--space-8);">
                        <p class="section__label">{{ __('portfolio.projects.title') }}</p>
                        <h2 class="section__title" style="font-size: var(--text-4xl);">{{ __('portfolio.projects.subtitle') }}</h2>
                    </div>

                    {{-- Filtros de categoria --}}
                    <div class="projects__filters" role="group" aria-label="Filtrar proyectos por categoria">
                        <button class="filter-btn active" data-filter="all" aria-pressed="true">
                            {{ __('portfolio.projects.all') }}
                        </button>
                        <button class="filter-btn" data-filter="web" aria-pressed="false">
                            <i class="bx bx-globe" aria-hidden="true"></i>
                            {{ __('portfolio.projects.web') }}
                        </button>
                        <button class="filter-btn" data-filter="mobile" aria-pressed="false">
                            <i class="bx bx-mobile-alt" aria-hidden="true"></i>
                            {{ __('portfolio.projects.mobile') }}
                        </button>
                        <button class="filter-btn" data-filter="backend" aria-pressed="false">
                            <i class="bx bx-server" aria-hidden="true"></i>
                            {{ __('portfolio.projects.backend') }}
                        </button>
                        <button class="filter-btn" data-filter="erp" aria-pressed="false">
                            <i class="bx bx-buildings" aria-hidden="true"></i>
                            {{ __('portfolio.projects.erp') }}
                        </button>
                    </div>

                    {{-- Grid de proyectos --}}
                    <div class="projects__grid" id="projects-grid" role="list" aria-label="{{ __('portfolio.projects.title') }}">

                        @php $locale = app()->getLocale(); @endphp

                        @foreach($projects as $project)

                            @if($project->type === 'featured')
                            {{-- ---- Plantilla 1: Featured (tarjeta destacada grande) ---- --}}
                            <article class="project-featured anim-ready"
                                     data-category="{{ $project->category }}"
                                     role="listitem"
                                     aria-label="{{ $project->{'title_' . $locale} }}">
                                <div>
                                    <p class="project-featured__tag">
                                        <i class="bx bxs-star" aria-hidden="true"></i>
                                        {{ __('portfolio.projects.featured') }}
                                    </p>
                                    <h3 class="project-featured__title">{{ $project->{'title_' . $locale} }}</h3>
                                    <p class="project-featured__desc">{{ $project->{'description_' . $locale} }}</p>
                                    <div class="tech-tags" aria-label="Tecnologias">
                                        @foreach($project->technologies as $tech)
                                        <span class="tech-tag">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                    <div class="project-actions">
                                        @if($project->url)
                                        <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer"
                                           class="btn btn--primary btn--sm"
                                           aria-label="{{ __('portfolio.projects.view_demo') }}: {{ $project->{'title_' . $locale} }}">
                                            <i class="bx bx-link-external" aria-hidden="true"></i>
                                            {{ __('portfolio.projects.view_demo') }}
                                        </a>
                                        @else
                                        <span class="btn btn--outline btn--sm" style="cursor: default; opacity: 0.6;">
                                            <i class="bx bx-lock" aria-hidden="true"></i>
                                            {{ __('portfolio.projects.no_url') }}
                                        </span>
                                        @endif
                                        @if($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                           class="btn btn--outline btn--sm"
                                           aria-label="{{ __('portfolio.projects.view_code') }}">
                                            <i class="bx bxl-github" aria-hidden="true"></i>
                                            {{ __('portfolio.projects.view_code') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="project-featured__meta">
                                    @php
                                    $statusClass = match($project->status_en) {
                                        'Production'      => 'prod',
                                        'Personal Project'=> 'personal',
                                        default           => 'completed',
                                    };
                                    @endphp
                                    <span class="project-status project-status--{{ $statusClass }}">
                                        <span class="project-status__dot" aria-hidden="true"></span>
                                        {{ $project->{'status_' . $locale} }}
                                    </span>
                                    @if($project->period)
                                    <p style="font-size: var(--text-xs); color: var(--color-text-muted);">
                                        <i class="bx bx-calendar" aria-hidden="true"></i>
                                        {{ $project->period }}
                                    </p>
                                    @endif
                                    @if($project->company)
                                    <p style="font-size: var(--text-xs); color: var(--color-text-muted);">
                                        <i class="bx bx-buildings" aria-hidden="true"></i>
                                        {{ $project->company }}
                                    </p>
                                    @endif
                                </div>
                            </article>

                            @elseif($project->type === 'card')
                            {{-- ---- Plantilla 2: Card normal (grid) ---- --}}
                            <article class="project-card anim-ready"
                                     data-category="{{ $project->category }}"
                                     role="listitem"
                                     aria-label="{{ $project->{'title_' . $locale} }}">
                                <div class="project-card__header">
                                    <span class="project-card__category">
                                        {{ __('portfolio.projects.' . $project->category) ?? $project->category }}
                                    </span>
                                    @php
                                    $statusClass = match($project->status_en) {
                                        'Production'      => 'prod',
                                        'Personal Project'=> 'personal',
                                        default           => 'completed',
                                    };
                                    @endphp
                                    <span class="project-status project-status--{{ $statusClass }}">
                                        <span class="project-status__dot" aria-hidden="true"></span>
                                        {{ $project->{'status_' . $locale} }}
                                    </span>
                                </div>
                                <h3 class="project-card__title">{{ $project->{'title_' . $locale} }}</h3>
                                <p class="project-card__desc">{{ $project->{'description_' . $locale} }}</p>
                                <div class="tech-tags" aria-label="Tecnologias">
                                    @foreach($project->technologies as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                                @if($project->period || $project->company)
                                <p style="font-size: var(--text-xs); color: var(--color-text-muted); display: flex; gap: var(--space-4);">
                                    @if($project->period)
                                    <span><i class="bx bx-calendar" aria-hidden="true"></i> {{ $project->period }}</span>
                                    @endif
                                    @if($project->company)
                                    <span><i class="bx bx-buildings" aria-hidden="true"></i> {{ $project->company }}</span>
                                    @endif
                                </p>
                                @endif
                                <div class="project-actions">
                                    @if($project->url)
                                    <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer"
                                       class="btn btn--primary btn--sm"
                                       aria-label="{{ __('portfolio.projects.view_demo') }}">
                                        <i class="bx bx-link-external" aria-hidden="true"></i>
                                        {{ __('portfolio.projects.view_demo') }}
                                    </a>
                                    @endif
                                    @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer"
                                       class="btn btn--outline btn--sm"
                                       aria-label="{{ __('portfolio.projects.view_code') }}">
                                        <i class="bx bxl-github" aria-hidden="true"></i>
                                        {{ __('portfolio.projects.view_code') }}
                                    </a>
                                    @endif
                                    @if(!$project->url && !$project->github_url)
                                    <span class="btn btn--outline btn--sm" style="cursor: default; opacity: 0.6;">
                                        <i class="bx bx-lock" aria-hidden="true"></i>
                                        {{ __('portfolio.projects.no_url') }}
                                    </span>
                                    @endif
                                </div>
                            </article>

                            @elseif($project->type === 'timeline')
                            {{-- ---- Plantilla 3: Timeline (primera del tipo) ---- --}}
                            {{-- Solo renderiza el contenedor de timeline una vez --}}
                            @if(!isset($timelineRendered))
                            @php $timelineRendered = true; @endphp
                            <div class="project-timeline-wrap anim-ready" data-category="all-timeline">
                                <p class="section__label" style="margin-bottom: var(--space-6);">
                                    {{ app()->getLocale() === 'es' ? 'Otros Proyectos' : 'Other Projects' }}
                                </p>
                                <div class="timeline-list" role="list">
                            @endif

                            <article class="timeline-project"
                                     data-category="{{ $project->category }}"
                                     role="listitem"
                                     aria-label="{{ $project->{'title_' . $locale} }}">
                                <div class="timeline-project__header">
                                    <h3 class="timeline-project__title">{{ $project->{'title_' . $locale} }}</h3>
                                    @if($project->period)
                                    <span class="timeline-project__period">{{ $project->period }}</span>
                                    @endif
                                </div>
                                @if($project->company)
                                <p class="timeline-project__company">
                                    <i class="bx bx-buildings" aria-hidden="true"></i>
                                    {{ $project->company }}
                                </p>
                                @endif
                                <p class="timeline-project__desc">{{ $project->{'description_' . $locale} }}</p>
                                <div class="tech-tags" style="margin-top: var(--space-3);" aria-label="Tecnologias">
                                    @foreach($project->technologies as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                                @if($project->url)
                                <div style="margin-top: var(--space-3);">
                                    <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer"
                                       class="btn btn--outline btn--sm"
                                       aria-label="{{ __('portfolio.projects.view_demo') }}">
                                        <i class="bx bx-link-external" aria-hidden="true"></i>
                                        {{ __('portfolio.projects.view_demo') }}
                                    </a>
                                </div>
                                @endif
                            </article>

                            @endif {{-- /project->type --}}

                        @endforeach

                        {{-- Cierra el contenedor de timeline si fue abierto --}}
                        @if(isset($timelineRendered))
                                </div>{{-- /timeline-list --}}
                            </div>{{-- /project-timeline-wrap --}}
                        @endif

                    </div>{{-- /projects-grid --}}

                    {{-- Footer de proyectos --}}
                    <footer class="footer" style="margin-top: var(--space-16);" role="contentinfo">
                        <span>&copy; {{ date('Y') }} {{ $developerData['name'] }}. {{ __('portfolio.footer.rights') }}</span>
                        <div class="footer__links">
                            <a href="{{ $developerData['github'] }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                                <i class="bx bxl-github" aria-hidden="true"></i>
                            </a>
                        </div>
                    </footer>

                </div>{{-- /projects__inner --}}
            </section>{{-- /page-projects --}}

            {{-- ========================================================
                 PAGINA 2: CONTACTO
                 Informacion de contacto con iconos
                 ======================================================== --}}
            <section id="page-contact" class="page" aria-label="{{ __('portfolio.nav.contact') }}">
                <div class="contact__inner">

                    {{-- Encabezado --}}
                    <div style="margin-bottom: var(--space-4);">
                        <p class="section__label">{{ __('portfolio.contact.title') }}</p>
                        <h2 class="section__title" style="font-size: var(--text-4xl);">{{ __('portfolio.contact.subtitle') }}</h2>
                    </div>

                    {{-- Badge de disponibilidad --}}
                    <div class="contact__available anim-ready">
                        <span class="status-dot" style="background: var(--color-advanced);" aria-hidden="true"></span>
                        {{ __('portfolio.contact.available') }}
                    </div>

                    {{-- Grid de datos de contacto --}}
                    <div class="contact__grid" role="list" aria-label="{{ __('portfolio.contact.title') }}">

                        {{-- Correo electronico --}}
                        <div class="contact-item anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bx-envelope"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.email') }}</p>
                                <p class="contact-item__value">
                                    <a href="mailto:{{ $developerData['email'] }}"
                                       aria-label="Enviar correo a {{ $developerData['email'] }}">
                                        {{ $developerData['email'] }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        {{-- Telefono --}}
                        <div class="contact-item anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bx-phone"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.phone') }}</p>
                                <p class="contact-item__value">
                                    <a href="tel:{{ preg_replace('/\s/', '', $developerData['phone']) }}"
                                       aria-label="Llamar a {{ $developerData['phone'] }}">
                                        {{ $developerData['phone'] }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        {{-- Cedula profesional --}}
                        <div class="contact-item anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bxs-id-card"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.cedula') }}</p>
                                <p class="contact-item__value">{{ $developerData['cedula'] }}</p>
                            </div>
                        </div>

                        {{-- Fecha de nacimiento --}}
                        <div class="contact-item anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bx-calendar-heart"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.birthdate') }}</p>
                                <p class="contact-item__value">
                                    @php
                                    $date = \Carbon\Carbon::parse($developerData['birthdate']);
                                    echo app()->getLocale() === 'es'
                                        ? $date->locale('es')->isoFormat('D [de] MMMM [de] YYYY')
                                        : $date->format('F j, Y');
                                    @endphp
                                </p>
                            </div>
                        </div>

                        {{-- Ubicacion --}}
                        <div class="contact-item anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bx-map"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.location') }}</p>
                                <p class="contact-item__value">
                                    {{ $developerData['location_' . app()->getLocale()] }}
                                </p>
                            </div>
                        </div>

                        {{-- GitHub --}}
                        <div class="contact-item anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bxl-github"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.github') }}</p>
                                <p class="contact-item__value">
                                    <a href="{{ $developerData['github'] }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       aria-label="Ver perfil de GitHub">
                                        {{ str_replace('https://', '', $developerData['github']) }}
                                    </a>
                                </p>
                            </div>
                        </div>

                        {{-- LinkedIn (ocupa ancho completo) --}}
                        <div class="contact-item contact-item--full anim-ready" role="listitem">
                            <div class="contact-item__icon" aria-hidden="true">
                                <i class="bx bxl-linkedin"></i>
                            </div>
                            <div>
                                <p class="contact-item__label">{{ __('portfolio.contact.linkedin') }}</p>
                                <p class="contact-item__value">
                                    <a href="{{ $developerData['linkedin'] }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       aria-label="Ver perfil de LinkedIn">
                                        {{ str_replace('https://', '', $developerData['linkedin']) }}
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>{{-- /contact__grid --}}

                    {{-- Footer --}}
                    <footer class="footer" style="margin-top: var(--space-16); padding-left: 0; padding-right: 0;" role="contentinfo">
                        <span>
                            {{ __('portfolio.footer.made_with') }}
                            <span class="footer__heart" aria-label="amor">&hearts;</span>
                            {{ __('portfolio.footer.and') }} Laravel &mdash;
                            &copy; {{ date('Y') }} {{ $developerData['name'] }} {{ $developerData['lastname'] }}.
                            {{ __('portfolio.footer.rights') }}
                        </span>
                    </footer>

                </div>{{-- /contact__inner --}}
            </section>{{-- /page-contact --}}

        </div>{{-- /pages-track --}}
    </div>{{-- /app --}}

    {{-- ============================================================
         CONTROLES DE NAVEGACION - Flechas y puntos indicadores
         ============================================================ --}}
    <button class="nav-arrow nav-arrow--prev" id="arrow-prev"
            aria-label="Pagina anterior"
            aria-controls="pages-track"
            disabled>
        <i class="bx bx-chevron-left" aria-hidden="true"></i>
    </button>
    <button class="nav-arrow nav-arrow--next" id="arrow-next"
            aria-label="Siguiente pagina"
            aria-controls="pages-track">
        <i class="bx bx-chevron-right" aria-hidden="true"></i>
    </button>

    {{-- Indicadores de pagina (puntos) --}}
    <nav class="page-dots" role="tablist" aria-label="Navegacion de paginas">
        <button class="page-dot active" onclick="goToPage(0)"
                role="tab" aria-selected="true" aria-label="{{ __('portfolio.nav.home') }}"></button>
        <button class="page-dot" onclick="goToPage(1)"
                role="tab" aria-selected="false" aria-label="{{ __('portfolio.nav.projects') }}"></button>
        <button class="page-dot" onclick="goToPage(2)"
                role="tab" aria-selected="false" aria-label="{{ __('portfolio.nav.contact') }}"></button>
    </nav>

    {{-- ============================================================
         SCRIPTS
         Anime.js para animaciones, luego el JS del portafolio
         ============================================================ --}}

    {{-- Anime.js desde CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <script>
        /**
         * portfolio.js - Logica de animaciones y navegacion del portafolio
         *
         * Estructura:
         *  1. Estado global
         *  2. Preloader con anime.js
         *  3. Animacion de entrada principal
         *  4. Navegacion horizontal de paginas
         *  5. Filtro de proyectos
         *  6. Menu movil
         *  7. Animacion de elementos al entrar en viewport (IntersectionObserver)
         *  8. Swipe en tactil
         *  9. Inicializacion
         */

        /* ================================================================
           1. ESTADO GLOBAL
           ================================================================ */
        const state = {
            currentPage: 0,         // Indice de pagina activa (0, 1, 2)
            totalPages: 3,          // Total de paginas en el track
            isAnimating: false,     // Bloqueo durante transicion de pagina
            transitionDuration: 700 // Duracion de la transicion en ms
        };

        /* ================================================================
           2. PRELOADER
           Secuencia de animacion antes de mostrar el contenido:
           1. Aparece el monograma
           2. Se llena la barra de progreso
           3. Aparece el texto "Cargando..."
           4. Se oculta el preloader
           5. Se reproduce la animacion de entrada principal
           ================================================================ */
        function runPreloader() {
            const monogram = document.querySelector('.preloader__monogram');
            const bar      = document.querySelector('.preloader__bar');
            const text     = document.querySelector('.preloader__text');
            const preloader = document.getElementById('preloader');

            // Paso 1: Aparece el monograma con un rebote sutil
            anime({
                targets: monogram,
                opacity: [0, 1],
                scale: [0.8, 1],
                duration: 600,
                easing: 'easeOutBack',
                complete: function() {

                    // Paso 2: Texto aparece
                    anime({
                        targets: text,
                        opacity: [0, 1],
                        translateY: [8, 0],
                        duration: 400,
                        easing: 'easeOutQuad'
                    });

                    // Paso 3: Barra de progreso se llena
                    anime({
                        targets: bar,
                        width: ['0%', '100%'],
                        duration: 1000,
                        easing: 'easeInOutQuart',
                        delay: 100,
                        complete: function() {

                            // Paso 4: Ocultar preloader con fade out
                            anime({
                                targets: preloader,
                                opacity: [1, 0],
                                duration: 500,
                                delay: 200,
                                easing: 'easeInQuad',
                                complete: function() {
                                    preloader.classList.add('hidden');
                                    // Paso 5: Animar entrada del hero
                                    runHeroEntrance();
                                }
                            });
                        }
                    });
                }
            });
        }

        /* ================================================================
           3. ANIMACION DE ENTRADA DEL HERO
           Revelacion escalonada de los elementos principales
           de la pagina de bienvenida usando anime.js stagger
           ================================================================ */
        function runHeroEntrance() {
            // Elementos del hero con clases 'anim-ready' en la pagina activa
            const heroElements = document.querySelectorAll(
                '#page-home .hero__intro .anim-ready'
            );

            anime({
                targets: heroElements,
                opacity: [0, 1],
                translateY: [30, 0],
                duration: 700,
                delay: anime.stagger(100, { start: 0 }),
                easing: 'easeOutCubic'
            });
        }

        /* ================================================================
           4. NAVEGACION HORIZONTAL DE PAGINAS
           Mueve el #pages-track con translateX usando anime.js
           ================================================================ */

        /**
         * Navega a una pagina especifica por su indice.
         * @param {number} pageIndex - Indice destino (0, 1, 2)
         */
        function goToPage(pageIndex) {
            // No navegar si ya esta animando o si es la misma pagina
            if (state.isAnimating || pageIndex === state.currentPage) return;
            if (pageIndex < 0 || pageIndex >= state.totalPages) return;

            state.isAnimating = true;

            const track = document.getElementById('pages-track');
            const targetX = pageIndex * -100; // Cada pagina es 100vw

            // Animacion de deslizamiento horizontal
            anime({
                targets: track,
                translateX: targetX + 'vw',
                duration: state.transitionDuration,
                easing: 'easeInOutQuart',
                complete: function() {
                    state.currentPage = pageIndex;
                    state.isAnimating = false;

                    // Actualiza controles de UI
                    updateNavState();

                    // Anima los elementos de la nueva pagina
                    animatePageEntrance(pageIndex);
                }
            });

            // Actualiza visualmente antes de que termine la animacion
            updateNavLinks(pageIndex);
            updateDots(pageIndex);
            updateArrows(pageIndex);
        }

        /**
         * Actualiza el estado de la navegacion (links, puntos, flechas)
         * despues de completar una transicion de pagina.
         */
        function updateNavState() {
            updateNavLinks(state.currentPage);
            updateDots(state.currentPage);
            updateArrows(state.currentPage);
        }

        /**
         * Marca como activo el link de navegacion correspondiente.
         * @param {number} pageIndex
         */
        function updateNavLinks(pageIndex) {
            document.querySelectorAll('.nav__link').forEach((link, i) => {
                link.classList.toggle('active', i === pageIndex);
            });
        }

        /**
         * Actualiza los puntos indicadores de pagina.
         * @param {number} pageIndex
         */
        function updateDots(pageIndex) {
            document.querySelectorAll('.page-dot').forEach((dot, i) => {
                const isActive = i === pageIndex;
                dot.classList.toggle('active', isActive);
                dot.setAttribute('aria-selected', isActive.toString());
            });
        }

        /**
         * Habilita o deshabilita las flechas de navegacion
         * segun la posicion actual.
         * @param {number} pageIndex
         */
        function updateArrows(pageIndex) {
            const prev = document.getElementById('arrow-prev');
            const next = document.getElementById('arrow-next');

            prev.disabled = pageIndex === 0;
            next.disabled = pageIndex === state.totalPages - 1;
        }

        /**
         * Anima con anime.js los elementos marcados con .anim-ready
         * en la pagina que acaba de entrar en vista.
         * @param {number} pageIndex
         */
        function animatePageEntrance(pageIndex) {
            const pages = ['page-home', 'page-projects', 'page-contact'];
            const pageEl = document.getElementById(pages[pageIndex]);
            if (!pageEl) return;

            // Solo anima elementos que aun no han sido revelados
            const readyElements = pageEl.querySelectorAll('.anim-ready');

            if (readyElements.length > 0) {
                anime({
                    targets: readyElements,
                    opacity: [0, 1],
                    translateY: [24, 0],
                    duration: 600,
                    delay: anime.stagger(60, { start: 100 }),
                    easing: 'easeOutCubic',
                    complete: function() {
                        // Marca los elementos como animados para no repetir
                        readyElements.forEach(el => el.classList.remove('anim-ready'));
                    }
                });
            }
        }

        /* ================================================================
           5. FILTRO DE PROYECTOS
           Filtra las tarjetas por categoria con animacion suave
           ================================================================ */
        function initProjectFilters() {
            const filterBtns = document.querySelectorAll('.filter-btn');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.dataset.filter;

                    // Actualiza el boton activo
                    filterBtns.forEach(b => {
                        b.classList.remove('active');
                        b.setAttribute('aria-pressed', 'false');
                    });
                    this.classList.add('active');
                    this.setAttribute('aria-pressed', 'true');

                    // Filtra los articulos de proyecto
                    const items = document.querySelectorAll(
                        '.project-featured, .project-card, .timeline-project'
                    );

                    // Tambien el contenedor del timeline
                    const timelineWrap = document.querySelector('.project-timeline-wrap');

                    let timelineVisible = false;

                    items.forEach(item => {
                        const category = item.dataset.category;
                        const matches  = filter === 'all' || category === filter;

                        if (matches) {
                            item.classList.remove('project-hidden');
                            // Micro-animacion de aparicion
                            anime({
                                targets: item,
                                opacity: [0, 1],
                                scale: [0.95, 1],
                                duration: 300,
                                easing: 'easeOutCubic'
                            });
                            if (item.classList.contains('timeline-project')) {
                                timelineVisible = true;
                            }
                        } else {
                            // Oculta sin animacion para evitar flicker
                            item.classList.add('project-hidden');
                        }
                    });

                    // Muestra u oculta el contenedor de timeline completo
                    if (timelineWrap) {
                        if (filter === 'all' || timelineVisible) {
                            timelineWrap.classList.remove('project-hidden');
                        } else {
                            timelineWrap.classList.add('project-hidden');
                        }
                    }
                });
            });
        }

        /* ================================================================
           6. MENU MOVIL
           ================================================================ */
        function initMobileMenu() {
            const hamburger = document.getElementById('nav-hamburger');
            const menu      = document.getElementById('mobile-menu');
            const closeBtn  = document.getElementById('mobile-menu-close');

            hamburger.addEventListener('click', function() {
                menu.classList.add('open');
                hamburger.setAttribute('aria-expanded', 'true');
                // Anima las lineas del hamburger
                anime({
                    targets: hamburger.querySelectorAll('span'),
                    opacity: [1, 0],
                    duration: 200,
                    easing: 'easeOutQuad'
                });
                // Anima la entrada del menu
                anime({
                    targets: menu.querySelectorAll('.nav__mobile-link'),
                    opacity: [0, 1],
                    translateY: [30, 0],
                    delay: anime.stagger(80, { start: 100 }),
                    duration: 400,
                    easing: 'easeOutCubic'
                });
            });

            closeBtn.addEventListener('click', closeMobileMenu);

            // Cierra al presionar Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && menu.classList.contains('open')) {
                    closeMobileMenu();
                }
            });
        }

        function closeMobileMenu() {
            const menu     = document.getElementById('mobile-menu');
            const hamburger = document.getElementById('nav-hamburger');

            menu.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');

            // Restaura las lineas del hamburger
            anime({
                targets: hamburger.querySelectorAll('span'),
                opacity: [0, 1],
                duration: 200,
                easing: 'easeOutQuad'
            });
        }

        /* ================================================================
           7. ANIMACION POR INTERSECCION (IntersectionObserver)
           Revela elementos .anim-ready al hacer scroll dentro de una pagina
           ================================================================ */
        function initScrollAnimations() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && entry.target.classList.contains('anim-ready')) {
                        anime({
                            targets: entry.target,
                            opacity: [0, 1],
                            translateY: [20, 0],
                            duration: 500,
                            easing: 'easeOutCubic',
                            complete: function() {
                                entry.target.classList.remove('anim-ready');
                                observer.unobserve(entry.target);
                            }
                        });
                    }
                });
            }, {
                threshold: 0.1,    // Activa cuando el 10% del elemento es visible
                rootMargin: '0px'
            });

            // Observa todos los elementos animables en la pagina actual
            document.querySelectorAll('.anim-ready').forEach(el => {
                observer.observe(el);
            });
        }

        /* ================================================================
           8. SOPORTE DE SWIPE EN DISPOSITIVOS TACTILES
           Detecta swipe horizontal para cambiar de pagina en moviles
           ================================================================ */
        function initSwipeNavigation() {
            let touchStartX = 0;
            let touchEndX   = 0;
            const MIN_SWIPE_DISTANCE = 60; // Pixeles minimos para considerar swipe

            document.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            document.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                const delta = touchStartX - touchEndX;

                if (Math.abs(delta) >= MIN_SWIPE_DISTANCE) {
                    if (delta > 0) {
                        // Swipe hacia la izquierda: siguiente pagina
                        goToPage(state.currentPage + 1);
                    } else {
                        // Swipe hacia la derecha: pagina anterior
                        goToPage(state.currentPage - 1);
                    }
                }
            }, { passive: true });
        }

        /* ================================================================
           EVENTOS DE TECLADO para accesibilidad en nav links
           ================================================================ */
        function initKeyboardNav() {
            document.querySelectorAll('.nav__link').forEach((link, index) => {
                link.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        goToPage(index);
                    }
                });
            });

            // Flechas del teclado para navegar entre paginas
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowRight') goToPage(state.currentPage + 1);
                if (e.key === 'ArrowLeft')  goToPage(state.currentPage - 1);
            });
        }

        /* ================================================================
           BOTONES DE FLECHA
           ================================================================ */
        function initArrowButtons() {
            document.getElementById('arrow-prev').addEventListener('click', function() {
                goToPage(state.currentPage - 1);
            });
            document.getElementById('arrow-next').addEventListener('click', function() {
                goToPage(state.currentPage + 1);
            });
        }

        /* ================================================================
           9. INICIALIZACION
           Se ejecuta cuando el DOM esta completamente cargado
           ================================================================ */
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa todos los modulos
            initProjectFilters();
            initMobileMenu();
            initScrollAnimations();
            initSwipeNavigation();
            initKeyboardNav();
            initArrowButtons();

            // Estado inicial correcto de las flechas
            updateArrows(0);

            // Inicia el preloader (primer evento visual del usuario)
            runPreloader();
        });
    </script>
</body>
</html>
