{{-- =============================================================
     components/preloader.blade.php
     Pantalla de carga inicial. Las animaciones las maneja
     anime.js desde app.js en la funcion runPreloader().
     ============================================================= --}}
<div id="preloader" role="status" aria-label="{{ __('portfolio.preloader.loading') }}">
    <div class="preloader__monogram" aria-hidden="true">
        {{ strtoupper(substr($developerData['name'], 0, 1)) }}{{ strtoupper(substr($developerData['lastname'], 0, 1)) }}
    </div>
    <div class="preloader__bar-wrap" aria-hidden="true">
        <div class="preloader__bar" id="preloader-bar"></div>
    </div>
    <p class="preloader__text" aria-hidden="true">{{ __('portfolio.preloader.loading') }}</p>
</div>
