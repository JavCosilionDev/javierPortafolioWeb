{{-- =============================================================
     components/mobile-menu.blade.php
     Overlay full-screen del menu de navegacion para moviles.
     Se abre con el boton hamburguesa y se cierra con el
     boton X o al seleccionar una seccion.
     ============================================================= --}}
<div class="nav__mobile-menu" id="mobile-menu"
     role="dialog"
     aria-label="Menu de navegacion"
     aria-modal="true">

    {{-- Boton cerrar --}}
    <button class="nav__mobile-close" id="mobile-menu-close"
            aria-label="Cerrar menu">
        <i class="bx bx-x" aria-hidden="true"></i>
    </button>

    {{-- Selector de idioma dentro del menu movil --}}
    @include('components.language-switcher')

    {{-- Links de navegacion --}}
    <span class="nav__mobile-link" data-page="0" role="button" tabindex="0">
        {{ __('portfolio.nav.home') }}
    </span>
    <span class="nav__mobile-link" data-page="1" role="button" tabindex="0">
        {{ __('portfolio.nav.projects') }}
    </span>
    <span class="nav__mobile-link" data-page="2" role="button" tabindex="0">
        {{ __('portfolio.nav.contact') }}
    </span>

</div>
