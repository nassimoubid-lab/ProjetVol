@extends('layout')

@section('title', 'Récapitulatif')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success text-center" role="alert">
        Merci {{ $reservations->first()->resPassenger->first_name }} d'avoir réservé vos billets chez nous !
    </div>

    <h2 class="text-center mb-4 text-primary">Vos réservations</h2>

    @php
        // On groupe les réservations par vol
        $reservationsGrouped = $reservations->groupBy('resVol.id');
    @endphp

    @foreach($reservationsGrouped as $volReservations)
        @php
            $vol = $volReservations->first()->resVol; // Récupère les informations du vol
            $nombrePlacesReservees = $volReservations->count(); // Nombre de places réservées pour ce vol
        @endphp

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

                        <div class="text-muted mt-2">
                            <strong>Nombre de places réservées :</strong> {{ $nombrePlacesReservees }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="text-center mt-4">
        <a href="{{ url('/') }}" class="btn btn-primary">Retour à la billetterie</a>
    </div>
</div>
@endsection