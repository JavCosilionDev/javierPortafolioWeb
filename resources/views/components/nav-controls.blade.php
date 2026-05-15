{{-- =============================================================
     components/nav-controls.blade.php
     Flechas de navegacion horizontal y puntos indicadores
     de pagina. Fijos sobre todas las paginas del portafolio.
     ============================================================= --}}

{{-- Flecha izquierda --}}
<button class="nav-arrow nav-arrow--prev" id="arrow-prev"
        aria-label="{{ app()->getLocale() === 'es' ? 'Pagina anterior' : 'Previous page' }}"
        aria-controls="pages-track"
        disabled>
    <i class="bx bx-chevron-left" aria-hidden="true"></i>
</button>

{{-- Flecha derecha --}}
<button class="nav-arrow nav-arrow--next" id="arrow-next"
        aria-label="{{ app()->getLocale() === 'es' ? 'Siguiente pagina' : 'Next page' }}"
        aria-controls="pages-track">
    <i class="bx bx-chevron-right" aria-hidden="true"></i>
</button>

{{-- Puntos indicadores de pagina --}}
<nav class="page-dots" role="tablist"
     aria-label="{{ app()->getLocale() === 'es' ? 'Navegacion de paginas' : 'Page navigation' }}">
    <button class="page-dot active" data-page="0"
            role="tab" aria-selected="true"
            aria-label="{{ __('portfolio.nav.home') }}">
    </button>
    <button class="page-dot" data-page="1"
            role="tab" aria-selected="false"
            aria-label="{{ __('portfolio.nav.projects') }}">
    </button>
    <button class="page-dot" data-page="2"
            role="tab" aria-selected="false"
            aria-label="{{ __('portfolio.nav.contact') }}">
    </button>
</nav>
