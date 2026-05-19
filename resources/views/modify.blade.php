@extends('layoutAdmin')

@section('title', 'Vols')

@section('content')
<form action="{{ route('modifiedvol') }}" method="POST">
    <div class="card mt-4" style="background-color: #333; border: 1px solid #ccc; padding: 20px;">

        @csrf

        <label class="text-white mt-2">Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $vol->name }}" required>

        <label class="text-white mt-2">Aéroport de départ</label>
        <select name="airport_depart_id" class="form-control" required>
            <option value="">Sélectionnez un aéroport</option>
            @foreach($airports as $airport) 
                <option value="{{ $airport->id }}" 
                    {{ $airport->id == $vol->airportDepart->id ? 'selected' : '' }}>
                    {{ $airport->name }}
                </option>
            @endforeach
        </select>

        <label class="text-white mt-2">Aéroport d'arrivée</label>
        <select name="airport_arrival_id" class="form-control" required>
            <option value="">Sélectionnez un aéroport</option>
            @foreach($airports as $airport) 
                <option value="{{ $airport->id }}" 
                    {{ $airport->id == $vol->airportArrival->id ? 'selected' : '' }}>
                    {{ $airport->name }}
                </option>
            @endforeach
        </select>

        <label class="text-white mt-2">Heure de départ</label>
        <input type="time" name="departure_time" class="form-control" value="{{ $vol->departure_time }}" required>

        <label class="text-white mt-2">Heure d'arrivée</label>
        <input type="time" name="arrival_time" class="form-control" value="{{ $vol->arrival_time }}" required>

        <label class="text-white mt-2">Date de départ</label>
        <input type="date" name="departure_date" class="form-control" value="{{ $vol->departure_date }}" required>

        <label class="text-white mt-2">Date d'arrivée</label>
        <input type="date" name="arrival_date" class="form-control" value="{{ $vol->arrival_date }}" required>

        <label class="text-white mt-2">Places</label>
        <input type="number" name="seats" class="form-control" value="{{ $vol->seats }}" required>

        <label class="text-white mt-2">Prix</label>
        <input type="number" step="0.01" name="price" class="form-control" value="{{ $vol->price }}" required>

        <input type="hidden" name="id_vol" value="{{ $vol->id }}">

        <input type="submit" value="Envoyer" class="btn btn-primary mt-4">
    </form>
</div>

<a href="{{ url('/modify') }}" class="btn btn-outline-primary mt-3">Retour</a>
@endsection
