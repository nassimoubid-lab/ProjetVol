@extends('layout')

@section('title', 'Accueil')

@section('content')
<div class="container mt-5">

    @if(session('ajout'))
        <div class="alert alert-success">
            {{ session('ajout') }}
        </div>
    @endif

    <div class="bg-white p-5 rounded-lg shadow">
        <h2 class="mb-4 text-center text-primary fw-bold">Trouvez votre vol idéal</h2>
        <form action="{{ route('search.vols') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <label for="departure_airport_id" class="form-label text-muted">Aéroport de départ:</label>
                <select class="form-select form-select-lg rounded-pill border-0 shadow-sm" id="departure_airport_id" name="departure_airport_id">
                    <option value="">Tous les aéroports</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="arrival_airport_id" class="form-label text-muted">Aéroport d'arrivée:</label>
                <select class="form-select form-select-lg rounded-pill border-0 shadow-sm" id="arrival_airport_id" name="arrival_airport_id">
                    <option value="">Tous les aéroports</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="departure_date" class="form-label text-muted">Date de départ:</label>
                <input type="date" class="form-control form-control-lg rounded-pill border-0 shadow-sm" id="departure_date" name="departure_date">
            </div>

            <div class="col-md-6">
                <label for="arrival_date" class="form-label text-muted">Date d'arrivée:</label>
                <input type="date" class="form-control form-control-lg rounded-pill border-0 shadow-sm" id="arrival_date" name="arrival_date">
            </div>

            <div class="col-12 mt-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">Rechercher des vols</button>
            </div>
        </form>
    </div>

    <h3 class="mt-5 mb-4 text-secondary fw-light">Liste des vols disponibles</h3>

    @forelse($vols as $vol)
        <div class="card shadow-sm mb-4 border-0 rounded-lg">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="mb-3">
                        <h5 class="card-title fw-semibold">{{ $vol->name }}</h5>

                        <div class="text-muted mb-2">
                            <strong>Départ :</strong>
                            {{ $vol->airportDepart->name ?? 'Non renseigné' }} |
                            {{ $vol->departure_date }} |
                            {{ $vol->departure_time }}
                        </div>

                        <div class="text-muted">
                            <strong>Arrivée :</strong>
                            {{ $vol->airportArrival->name ?? 'Non renseigné' }} |
                            {{ $vol->arrival_date }} |
                            {{ $vol->arrival_time }}
                        </div>
                    </div>

                    <div class="text-end">
                        <h6 class="text-success fw-bold mb-2">{{ $vol->price }} €</h6>
                        <form action="{{ route('panier') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            
                            <input type="hidden" name="vol_id" value="{{ $vol->id }}">
                            <label for="quantity_{{ $vol->id }}" class="form-label text-muted me-2 mb-0">Quantité:</label>
                            <input type="number" id="quantity_{{ $vol->id }}" name="quantity" value="1" min="1" max="{{ $vol->seats }}" class="form-control form-control-sm rounded-pill border-0 shadow-sm" style="width: 60px;">
                            <button type="submit" class="btn btn-outline-success btn-sm rounded-pill ms-3">Ajouter</button>
                        </form>
                    </div>
                </div>
                    <div class="mt-2 text-muted small">
                        {{ $vol->seats }} sièges (faire les sièges restants)
                    </div>
  
                
            </div>
        </div>
        
    @empty
        <div class="alert alert-info rounded-lg shadow-sm" role="alert">
            Aucun vol ne correspond à vos critères de recherche.
        </div>
    @endforelse

</div>
@endsection
