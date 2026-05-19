@extends('layout')

@section('title', 'Liste des vols')

@section('content')
<h3 class="mt-5 mb-4 text-secondary fw-light">Liste des vols</h3>

    @forelse($list as $vol)
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
                        <form action="{{ route('panier') }}" method="POST" class="d-flex align-items-center">
                            @csrf
                            <input type="hidden" name="volid" value="{{ $vol->id }}">
                        </form>
                    </div>
                </div>

                <div class="mt-2 text-muted small">
                    {{ $vol->seats }} sièges 
                </div>
            </div>
        </div>
        @empty
    @endforelse
    <a href="{{ url('/compte') }}" class="btn btn-outline-primary">Retour</a>

</div>
@endsection
