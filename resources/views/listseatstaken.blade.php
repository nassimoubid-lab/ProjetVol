@extends('layoutAdmin')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
<a href="{{ url('/compte') }}" class="btn btn-outline-primary mb-3">Retour</a>

    <h2 class="mb-4">Liste des passagers par vol</h2>

    @if (count($listvols) >= 1)
        @foreach($listvols as $vol)
            @php
                $seatstaken = 0;
            @endphp

            @foreach($listpassenger as $passenger)
                @if($vol->id == $passenger->vol_id)
                    @php $seatstaken++; @endphp
                @endif
            @endforeach

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
<div class="text-muted mb-2">
                            <strong>Arrivée :</strong>
                            {{ $vol->airportArrival->name ?? 'Non renseigné' }} |
                            {{ $vol->arrival_date }} |
                            {{ $vol->arrival_time }}
                        </div>
                        <div class="text-muted mb-2">
                            <b>Places total :</b> {{ $vol->seats }}<br>
                        </div>
                        <div class="text-muted mb-2">
                            <b>Places réservées :</b> {{ $seatstaken }}<br>
                        </div>
                        <div class="text-muted mb-2">
                            <b>Place(s) restante(s) :</b> {{ $vol->seats - $seatstaken }}<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <p> Aucun vol disponible.</p>
        @endif
</div>
@endsection