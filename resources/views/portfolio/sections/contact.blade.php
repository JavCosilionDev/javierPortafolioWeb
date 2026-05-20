{{-- =============================================================
     portfolio/sections/contact.blade.php
     Pagina 2: Contacto.
     Muestra informacion de contacto con iconos:
     correo, telefono, cedula, ubicacion, fecha de nacimiento,
     GitHub y LinkedIn.
     ============================================================= --}}
<section id="page-contact" class="page" aria-label="{{ __('portfolio.nav.contact') }}">
    <div class="contact__inner">

        {{-- Encabezado --}}
        <div style="margin-bottom: var(--space-4);">
            <p class="section__label">{{ __('portfolio.contact.title') }}</p>
            <h2 class="section__title" style="font-size: var(--text-4xl);">
                {{ __('portfolio.contact.subtitle') }}
            </h2>
        </div>

        {{-- Indicador de disponibilidad --}}
        <div class="contact__available anim-ready">
            <span class="status-dot" style="background: var(--color-advanced);" aria-hidden="true"></span>
            {{ __('portfolio.contact.available') }}
        </div>

        {{-- Grid de datos de contacto --}}
        <div class="contact__grid" role="list" aria-label="{{ __('portfolio.contact.title') }}">

            {{-- Correo electronico --}}
            <div class="contact-item anim-ready" role="listitem" style="border: 1px solid #2e72fc;">
                <div class="contact-item__icon" aria-hidden="true">
                    <i class="bx bx-envelope"></i>
                </div>
                <div>
                    <p class="contact-item__label">{{ __('portfolio.contact.email') }}</p>
                    <p class="contact-item__value">
                        <a href="mailto:{{ $developerData['email'] }}"
                           aria-label="{{ __('portfolio.contact.email') }}: {{ $developerData['email'] }}">
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
                           aria-label="{{ __('portfolio.contact.phone') }}: {{ $developerData['phone'] }}">
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
                           aria-label="{{ __('portfolio.contact.github') }}">
                            {{ str_replace('https://', '', $developerData['github']) }}
                        </a>
                    </p>
                </div>
            </div>

            {{-- LinkedIn — ocupa el ancho completo --}}
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
                           aria-label="{{ __('portfolio.contact.linkedin') }}">
                            {{ str_replace('https://', '', $developerData['linkedin']) }}
                        </a>
                    </p>
                </div>
            </div>

        </div>{{-- /contact__grid --}}

        @include('components.footer')

    </div>{{-- /contact__inner --}}
</section>
