@extends('layoutAdmin')

@section('title', 'Vols')

@section('content')
<form action="{{ route('formvol') }}" method="POST">
    @csrf
    <div class="card" style="background-color: #333; border: 1px solid #ccc; padding: 20px;">

    <label class="text-white">Nom</label>
    <input type="text" name="name" class="form-control" required>

    <label class="text-white">Aéroport de départ</label>
    <select name="airport_depart_id" class="form-control" required>
        <option value="">Sélectionnez un aéroport</option>
        @foreach($list as $airport)
            <option value="{{ $airport->id }}">{{ $airport->name }}</option>
        @endforeach
    </select>

    <label class="text-white">Aéroport d'arrivée</label>
    <select name="airport_arrival_id" class="form-control" required>
        <option value="">Sélectionnez un aéroport</option>
        @foreach($list as $airport)
            <option value="{{ $airport->id }}">{{ $airport->name }}</option>
        @endforeach
    </select>

    <label class="text-white">Heure de départ</label>
    <input type="time" name="departure_time" class="form-control" required>

    <label class="text-white">Heure d'arrivée</label>
    <input type="time" name="arrival_time" class="form-control" required>

    <label class="text-white">Date de départ</label>
    <input type="date" name="departure_date" class="form-control" required>

    <label class="text-white">Date d'arrivée</label>
    <input type="date" name="arrival_date" class="form-control" required>

    <label class="text-white">Places</label>
    <input type="number" name="seats" class="form-control" required>

    <label class="text-white">Prix</label>
    <input type="number" name="price" class="form-control" required>

    <input type="submit" value="Envoyer" class="btn btn-primary mt-3">
</form>
</div>
<a href="{{ url('/compte') }}" class="btn btn-outline-primary mt-3">Retour</a>

@endsection
