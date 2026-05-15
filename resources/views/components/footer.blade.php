{{-- =============================================================
     components/footer.blade.php
     Footer reutilizable incluido al final de cada seccion.
     Muestra copyright y links a redes sociales.
     ============================================================= --}}
<footer class="footer" role="contentinfo">
    <span>
        {{ __('portfolio.footer.made_with') }}
        <span class="footer__heart" aria-label="{{ app()->getLocale() === 'es' ? 'amor' : 'love' }}">&hearts;</span>
        {{ __('portfolio.footer.and') }} Laravel &mdash;
        &copy; {{ date('Y') }} {{ $developerData['name'] }} {{ $developerData['lastname'] }}.
        {{ __('portfolio.footer.rights') }}
    </span>
    <div class="footer__links" aria-label="{{ app()->getLocale() === 'es' ? 'Redes sociales' : 'Social links' }}">
        <a href="{{ $developerData['github'] }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="GitHub">
            <i class="bx bxl-github" aria-hidden="true"></i>
        </a>
        <a href="{{ $developerData['linkedin'] }}"
           target="_blank"
           rel="noopener noreferrer"
           aria-label="LinkedIn">
            <i class="bx bxl-linkedin" aria-hidden="true"></i>
        </a>
    </div>
</footer>
