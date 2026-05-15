{{-- =============================================================
     components/language-switcher.blade.php
     Selector de idioma reutilizable.
     Se usa en la nav desktop y en el menu movil.
     ============================================================= --}}
<div class="nav__lang" role="group" aria-label="Seleccionar idioma">
    <a href="{{ route('language.switch', 'es') }}"
       class="{{ app()->getLocale() === 'es' ? 'active' : '' }}"
       aria-label="Cambiar a Espanol Mexico"
       aria-current="{{ app()->getLocale() === 'es' ? 'true' : 'false' }}">
        <span class="fi fi-mx fis"></span> ES - MX
    </a>
    <span class="nav__lang-sep" aria-hidden="true"></span>
    <a href="{{ route('language.switch', 'en') }}"
       class="{{ app()->getLocale() === 'en' ? 'active' : '' }}"
       aria-label="Switch to English US"
       aria-current="{{ app()->getLocale() === 'en' ? 'true' : 'false' }}">
        <span class="fi fi-us"></span> EN - US
    </a>
</div>
