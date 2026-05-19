@extends('layoutAdmin')

@section('title', 'Accueil')

@section('content')
<style>
    .btn-container {
        display: flex;
        gap: 10px;
    }
</style>
<div class="container mt-4">
    <h2 class="mb-4">Votre vol a bien été modifié !</h2>

    <div class="card mb-3 p-3">
        <b>Nom :</b> {{ $vol->name }}<br>

        <b>Aéroport de départ :</b> {{ $vol->airportDepart->name}}<br>

        <b>Aéroport d'arrivée :</b> {{ $vol->airportArrival->name}}<br>

        <b>Heure de départ :</b> {{ $vol->departure_time }}<br>

        <b>Heure d'arrivée :</b> {{ $vol->arrival_time }}<br>

        <b>Nombre de sièges restant :</b> {{ $vol->seats }}<br>

        <b>Prix :</b> {{ $vol->price }} €<br>
    </div>
    <div class="btn-container">
        <a href="{{ url('/compte') }}" class="btn btn-outline-primary mt-3">Retour au compte</a>
        <a href="{{ url('/modify') }}" class="btn btn-primary mt-3">Liste des vols</a>
    </div>
</div>
@endsection
