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

    {{-- Vite js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <div class="nav__logo" aria-label="Ir al inicio">
            {{ strtoupper(substr($developerData['name'], 0, 1)) }}.{{ strtoupper(substr($developerData['lastname'], 0, 1)) }}
        </div>

        {{-- Links de navegacion desktop --}}
        <ul class="nav__links" role="list">
            <li>
                <span class="nav__link active" data-page="0" role="button" tabindex="0">
                    {{ __('portfolio.nav.home') }}
                </span>
            </li>
            <li>
                <span class="nav__link" data-page="1" role="button" tabindex="0">
                    {{ __('portfolio.nav.projects') }}
                </span>
            </li>
            <li>
                <span class="nav__link" data-page="2" role="button" tabindex="0">
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

        <span class="nav__mobile-link">
            {{ __('portfolio.nav.home') }}
        </span>
        <span class="nav__mobile-link">
            {{ __('portfolio.nav.projects') }}
        </span>
        <span class="nav__mobile-link">
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
                                    <button class="btn btn--primary" aria-label="{{ __('portfolio.hero.cta_projects') }}">
                                        <i class="bx bx-grid-alt" aria-hidden="true"></i>
                                        {{ __('portfolio.hero.cta_projects') }}
                                    </button>
                                    <button class="btn btn--outline" aria-label="{{ __('portfolio.hero.cta_contact') }}">
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
        <button class="page-dot active"
                role="tab" aria-selected="true" aria-label="{{ __('portfolio.nav.home') }}"></button>
        <button class="page-dot"
                role="tab" aria-selected="false" aria-label="{{ __('portfolio.nav.projects') }}"></button>
        <button class="page-dot"
                role="tab" aria-selected="false" aria-label="{{ __('portfolio.nav.contact') }}"></button>
    </nav>


    {{-- Anime.js 3.2.1 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>


</body>
</html>
