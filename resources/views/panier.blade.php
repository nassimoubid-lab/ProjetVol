@extends('layout')

@section('title', 'Panier')

@section('content')
<div class="container mt-5">
    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="mb-4 text-center text-primary fw-bold">Votre Panier</h2>

        @php
            $total = 0;
        @endphp

        @forelse($list as $element)
            <div class="card shadow-sm mb-3 border-0 rounded-lg">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1 fw-semibold text-info">{{ $element->panierVolName->name }}</h6>
                            <small class="text-muted">Quantité: {{ $element->quantite }}</small>
                        </div>
                        <span class="badge bg-secondary rounded-pill">{{ $element->panierVolName->price * $element->quantite }} €</span>
                    </div>
                </div>
            </div>

            @php
                $total += $element->panierVolName->price * $element->quantite;
            @endphp

        @empty
            <div class="alert alert-info rounded-lg shadow-sm" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i> Aucun vol ajouté au panier. <a href="{{ url('/') }}" class="alert-link">Découvrez nos vols !</a>
            </div>
        @endforelse

        @if(count($list) > 0)
            <div class="text-end mt-4">
                <h5 class="fw-bold">Total : {{ $total }} €</h5>
            </div>
        @endif

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">Retour aux vols</a>
            @if(count($list) > 0)
                <form action="{{ route('registration') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success rounded-pill shadow-sm">
                        <i class="bi bi-check-circle-fill me-2"></i> Réserver
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
