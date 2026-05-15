{{-- =============================================================
     portfolio/index.blade.php
     Vista principal del portafolio.
     Solo orquesta las secciones; la logica esta en el
     PortfolioController y el HTML en cada seccion.
     ============================================================= --}}
@extends('layouts.app')

@section('pages')
    @include('portfolio.sections.home')
    @include('portfolio.sections.projects')
    @include('portfolio.sections.contact')
@endsection
