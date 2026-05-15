{{-- =============================================================
     components/nav.blade.php
     Barra de navegacion fija en la parte superior.
     Visible en todas las paginas del portafolio.
     ============================================================= --}}
<nav id="main-nav" role="navigation" aria-label="Navegacion principal">

    {{-- Monograma / Logo --}}
    <div class="nav__logo" data-page="0" role="button" tabindex="0"
         aria-label="{{ __('portfolio.nav.home') }}">
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

    {{-- Selector de idioma desktop --}}
    @include('components.language-switcher')

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
