{{-- =============================================================
     portfolio/sections/projects.blade.php
     Pagina 1: Proyectos.
     Tres plantillas: featured (destacada), card (grid)
     y timeline (linea de tiempo).
     ============================================================= --}}
<section id="page-projects" class="page" aria-label="{{ __('portfolio.nav.projects') }}">
    <div class="projects__inner">

        {{-- Encabezado --}}
        <div class="section__header" style="margin-bottom: var(--space-8);">
            <p class="section__label">{{ __('portfolio.projects.title') }}</p>
            <h2 class="section__title" style="font-size: var(--text-4xl);">
                {{ __('portfolio.projects.subtitle') }}
            </h2>
        </div>

        {{-- Filtros de categoria --}}
        <div class="projects__filters" role="group"
             aria-label="{{ app()->getLocale() === 'es' ? 'Filtrar proyectos por categoria' : 'Filter projects by category' }}">
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
        <div class="projects__grid" id="projects-grid" role="list"
             aria-label="{{ __('portfolio.projects.title') }}">

            @php
            $locale = app()->getLocale();
            $timelineRendered = false;
            @endphp

            @foreach($projects as $project)

                @if($project['type'] === 'featured')
                {{-- ---- Plantilla 1: Featured (tarjeta destacada grande) ---- --}}
                <article class="project-featured anim-ready"
                         data-category="{{ $project['category'] }}"
                         role="listitem"
                         aria-label="{{ $project['title_' . $locale] }}">
                    <div>
                        <p class="project-featured__tag">
                            <i class="bx bxs-star" aria-hidden="true"></i>
                            {{ __('portfolio.projects.featured') }}
                        </p>
                        <h3 class="project-featured__title">
                            {{ $project['title_' . $locale] }}
                        </h3>
                        <p class="project-featured__desc">
                            {{ $project['description_' . $locale] }}
                        </p>
                        <div class="tech-tags" aria-label="Tecnologias">
                            @foreach($project['technologies'] as $tech)
                            <span class="tech-tag">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="project-actions">
                            @if($project['url'])
                            <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer"
                               class="btn btn--primary btn--sm"
                               aria-label="{{ __('portfolio.projects.view_demo') }}">
                                <i class="bx bx-link-external" aria-hidden="true"></i>
                                {{ __('portfolio.projects.view_demo') }}
                            </a>
                            @else
                            <span class="btn btn--outline btn--sm" style="cursor: default; opacity: 0.6;">
                                <i class="bx bx-lock" aria-hidden="true"></i>
                                {{ __('portfolio.projects.no_url') }}
                            </span>
                            @endif

                            @if($project['github_url'])
                            <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer"
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
                        $statusClass = match($project['status_en']) {
                            'Production'       => 'prod',
                            'Personal Project' => 'personal',
                            default            => 'completed',
                        };
                        @endphp
                        <span class="project-status project-status--{{ $statusClass }}">
                            <span class="project-status__dot" aria-hidden="true"></span>
                            {{ $project['status_' . $locale] }}
                        </span>
                        @if($project['period'])
                        <p style="font-size: var(--text-xs); color: var(--color-text-muted);">
                            <i class="bx bx-calendar" aria-hidden="true"></i>
                            {{ $project['period'] }}
                        </p>
                        @endif
                        @if($project['company'])
                        <p style="font-size: var(--text-xs); color: var(--color-text-muted);">
                            <i class="bx bx-buildings" aria-hidden="true"></i>
                            {{ $project['company'] }}
                        </p>
                        @endif
                    </div>
                </article>

                @elseif($project['type'] === 'card')
                {{-- ---- Plantilla 2: Card normal (grid) ---- --}}
                <article class="project-card anim-ready"
                         data-category="{{ $project['category'] }}"
                         role="listitem"
                         aria-label="{{ $project['title_' . $locale] }}">
                    <div class="project-card__header">
                        <span class="project-card__category">
                            {{ __('portfolio.projects.' . $project['category']) }}
                        </span>
                        @php
                        $statusClass = match($project['status_en']) {
                            'Production'       => 'prod',
                            'Personal Project' => 'personal',
                            default            => 'completed',
                        };
                        @endphp
                        <span class="project-status project-status--{{ $statusClass }}">
                            <span class="project-status__dot" aria-hidden="true"></span>
                            {{ $project['status_' . $locale] }}
                        </span>
                    </div>
                    <h3 class="project-card__title">{{ $project['title_' . $locale] }}</h3>
                    <p class="project-card__desc">{{ $project['description_' . $locale] }}</p>
                    <div class="tech-tags" aria-label="Tecnologias">
                        @foreach($project['technologies'] as $tech)
                        <span class="tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @if($project['period'] || $project['company'])
                    <p style="font-size: var(--text-xs); color: var(--color-text-muted); display: flex; gap: var(--space-4);">
                        @if($project['period'])
                        <span>
                            <i class="bx bx-calendar" aria-hidden="true"></i>
                            {{ $project['period'] }}
                        </span>
                        @endif
                        @if($project['company'])
                        <span>
                            <i class="bx bx-buildings" aria-hidden="true"></i>
                            {{ $project['company'] }}
                        </span>
                        @endif
                    </p>
                    @endif
                    <div class="project-actions">
                        @if($project['url'])
                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer"
                           class="btn btn--primary btn--sm"
                           aria-label="{{ __('portfolio.projects.view_demo') }}">
                            <i class="bx bx-link-external" aria-hidden="true"></i>
                            {{ __('portfolio.projects.view_demo') }}
                        </a>
                        @endif
                        @if($project['github_url'])
                        <a href="{{ $project['github_url'] }}" target="_blank" rel="noopener noreferrer"
                           class="btn btn--outline btn--sm"
                           aria-label="{{ __('portfolio.projects.view_code') }}">
                            <i class="bx bxl-github" aria-hidden="true"></i>
                            {{ __('portfolio.projects.view_code') }}
                        </a>
                        @endif
                        @if(!$project['url'] && !$project['github_url'])
                        <span class="btn btn--outline btn--sm" style="cursor: default; opacity: 0.6;">
                            <i class="bx bx-lock" aria-hidden="true"></i>
                            {{ __('portfolio.projects.no_url') }}
                        </span>
                        @endif
                    </div>
                </article>

                @elseif($project['type'] === 'timeline')
                {{-- ---- Plantilla 3: Timeline ---- --}}
                @if(!$timelineRendered)
                @php $timelineRendered = true; @endphp
                <div class="project-timeline-wrap anim-ready">
                    <p class="section__label" style="margin-bottom: var(--space-6);">
                        {{ app()->getLocale() === 'es' ? 'Otros Proyectos' : 'Other Projects' }}
                    </p>
                    <div class="timeline-list" role="list">
                @endif

                        <article class="timeline-project"
                                 data-category="{{ $project['category'] }}"
                                 role="listitem"
                                 aria-label="{{ $project['title_' . $locale] }}">
                            <div class="timeline-project__header">
                                <h3 class="timeline-project__title">
                                    {{ $project['title_' . $locale] }}
                                </h3>
                                @if($project['period'])
                                <span class="timeline-project__period">{{ $project['period'] }}</span>
                                @endif
                            </div>
                            @if($project['company'])
                            <p class="timeline-project__company">
                                <i class="bx bx-buildings" aria-hidden="true"></i>
                                {{ $project['company'] }}
                            </p>
                            @endif
                            <p class="timeline-project__desc">
                                {{ $project['description_' . $locale] }}
                            </p>
                            <div class="tech-tags" style="margin-top: var(--space-3);">
                                @foreach($project['technologies'] as $tech)
                                <span class="tech-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                            @if($project['url'])
                            <div style="margin-top: var(--space-3);">
                                <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer"
                                   class="btn btn--outline btn--sm"
                                   aria-label="{{ __('portfolio.projects.view_demo') }}">
                                    <i class="bx bx-link-external" aria-hidden="true"></i>
                                    {{ __('portfolio.projects.view_demo') }}
                                </a>
                            </div>
                            @endif
                        </article>

                @endif

            @endforeach

            @if($timelineRendered)
                    </div>{{-- /timeline-list --}}
                </div>{{-- /project-timeline-wrap --}}
            @endif

        </div>{{-- /projects-grid --}}

        @include('components.footer')

    </div>{{-- /projects__inner --}}
</section>