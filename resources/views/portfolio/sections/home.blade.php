{{-- =============================================================
     portfolio/sections/home.blade.php
     Pagina 0: Bienvenida.
     Contiene: hero, tecnologias, herramientas,
     formacion academica y experiencia laboral.
     ============================================================= --}}
<section id="page-home" class="page" aria-label="{{ __('portfolio.nav.home') }}">
    <div class="home__scroll-container">
        <div class="home__inner">

            {{-- -------------------------------------------------------
                 HERO: Nombre, titulo, badges, resumen y CTAs
                 ------------------------------------------------------- --}}
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
                            +{{ $developerData['years_exp'] }}
                            {{ app()->getLocale() === 'es' ? 'anos de exp.' : 'years exp.' }}
                        </span>
                        <span class="badge badge--neutral">
                            <i class="bx bx-map-pin" aria-hidden="true"></i>
                            {{ $developerData['location_' . app()->getLocale()] }}
                        </span>
                    </div>

                    <p class="hero__summary anim-ready">{{ __('portfolio.hero.summary') }}</p>

                    <div class="hero__ctas anim-ready">
                        <button class="btn btn--primary js-goto" data-page="1"
                                aria-label="{{ __('portfolio.hero.cta_projects') }}">
                            <i class="bx bx-grid-alt" aria-hidden="true"></i>
                            {{ __('portfolio.hero.cta_projects') }}
                        </button>
                        <button class="btn btn--outline js-goto" data-page="2"
                                aria-label="{{ __('portfolio.hero.cta_contact') }}">
                            <i class="bx bx-envelope" aria-hidden="true"></i>
                            {{ __('portfolio.hero.cta_contact') }}
                        </button>
                    </div>
                </div>

                {{-- Card lateral: avatar y estado de disponibilidad --}}
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

            {{-- -------------------------------------------------------
                 TECNOLOGIAS DE PROGRAMACION
                 ------------------------------------------------------- --}}
            <div class="section" id="section-tech">
                <div class="section__header">
                    <p class="section__label">{{ __('portfolio.tech.title') }}</p>
                    <h2 class="section__title">{{ __('portfolio.tech.subtitle') }}</h2>
                </div>

                @php
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
                $databases = [
                    ['name' => 'MySQL',      'icon' => 'devicon-mysql-plain colored',      'level' => 'advanced'],
                    ['name' => 'PostgreSQL', 'icon' => 'devicon-postgresql-plain colored', 'level' => 'intermediate'],
                    ['name' => 'TypeORM',    'icon' => 'devicon-sequelize-plain colored',  'level' => 'intermediate'],
                ];
                @endphp

                {{-- Lenguajes --}}
                <p class="tech-group-label">{{ __('portfolio.tech.languages') }}</p>
                <div class="tech-grid" style="margin-bottom: var(--space-8);"
                     aria-label="{{ __('portfolio.tech.languages') }}">
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
                <p class="tech-group-label">{{ __('portfolio.tech.frameworks') }}</p>
                <div class="tech-grid" style="margin-bottom: var(--space-8);"
                     aria-label="{{ __('portfolio.tech.frameworks') }}">
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
                <p class="tech-group-label">{{ __('portfolio.tech.databases') }}</p>
                <div class="tech-grid" aria-label="{{ __('portfolio.tech.databases') }}">
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

            {{-- -------------------------------------------------------
                 HERRAMIENTAS Y SOFTWARE
                 ------------------------------------------------------- --}}
            <div class="section" id="section-tools">
                <div class="section__header">
                    <p class="section__label">{{ __('portfolio.tools.title') }}</p>
                    <h2 class="section__title">{{ __('portfolio.tools.subtitle') }}</h2>
                </div>

                @php
                $mainTools = [
                    ['name' => 'VS Code',    'icon' => 'devicon-vscode-plain colored'],
                    ['name' => 'Postman',    'icon' => 'bx bx-send'],
                    ['name' => 'Git',        'icon' => 'devicon-git-plain colored'],
                    ['name' => 'GitHub',     'icon' => 'devicon-github-original'],
                    ['name' => 'Bitbucket',  'icon' => 'devicon-bitbucket-original colored'],
                    ['name' => 'Draw.io',    'icon' => 'bx bx-shape-square'],
                    ['name' => 'Figma',      'icon' => 'devicon-figma-plain colored'],
                    ['name' => 'ExcelJS',    'icon' => 'bx bx-table'],
                    ['name' => 'jsPDF',      'icon' => 'bx bxs-file-pdf'],
                    ['name' => 'XAMPP',      'icon' => 'bx bx-server'],
                    ['name' => 'Notion',     'icon' => 'bx bx-note'],
                    ['name' => 'Trello',     'icon' => 'devicon-trello-plain colored'],
                ];
                $cloudTools = [
                    ['name' => 'Docker',          'icon' => 'devicon-docker-plain colored'],
                    ['name' => 'Microsoft Azure',  'icon' => 'devicon-azure-plain colored'],
                    ['name' => 'AWS',              'icon' => 'devicon-amazonwebservices-original colored'],
                    ['name' => 'pgAdmin',          'icon' => 'devicon-postgresql-plain colored'],
                    ['name' => 'n8n',              'icon' => 'bx bx-bot'],
                    ['name' => 'AI Tools',         'icon' => 'bx bx-brain'],
                ];
                @endphp

                <p class="tech-group-label">{{ __('portfolio.tools.main') }}</p>
                <div class="tools-list" style="margin-bottom: var(--space-8);"
                     aria-label="{{ __('portfolio.tools.main') }}">
                    @foreach($mainTools as $tool)
                    <span class="tool-chip anim-ready">
                        <i class="{{ $tool['icon'] }}" aria-hidden="true"></i>
                        {{ $tool['name'] }}
                    </span>
                    @endforeach
                </div>

                <p class="tech-group-label">{{ __('portfolio.tools.cloud') }}</p>
                <div class="tools-list" aria-label="{{ __('portfolio.tools.cloud') }}">
                    @foreach($cloudTools as $tool)
                    <span class="tool-chip anim-ready">
                        <i class="{{ $tool['icon'] }}" aria-hidden="true"></i>
                        {{ $tool['name'] }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- -------------------------------------------------------
                 FORMACION ACADEMICA Y EXPERIENCIA (dos columnas)
                 ------------------------------------------------------- --}}
            <div class="two-col">

                {{-- Formacion academica --}}
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
                            <li class="anim-ready"
                                style="display: flex; align-items: flex-start; gap: var(--space-3); font-size: var(--text-sm); color: var(--color-text-muted);">
                                <i class="bx bx-check"
                                   style="color: var(--color-accent); font-size: 1.1rem; flex-shrink: 0; margin-top: 2px;"
                                   aria-hidden="true"></i>
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

                    <div class="experience-timeline" role="list"
                         aria-label="{{ __('portfolio.experience.title') }}">
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
            @include('components.footer')

        </div>{{-- /home__inner --}}
    </div>{{-- /home__scroll-container --}}
</section>
