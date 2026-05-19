@extends('layoutAdmin')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Votre vol a bien été supprimé</h2>

    <a href="{{ url('/modify') }}" class="btn btn-primary">Retour à la liste des vols</a>
    <a href="{{ url('/compte') }}" class="btn btn-outline-primary">Retour au compte</a>

@endsection