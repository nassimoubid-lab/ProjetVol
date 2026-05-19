@extends('layout')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
<h2 class="mb-4">Panier</h2>

@foreach($list as $element)

<b>Vol :</b> {{ $element->panierVolName->name }}<br>

<b>Qte :</b> {{ $element->quantite }}<br>

@endforeach
<form action="{{ route('registration') }}" method="POST" class="mt-2">
@csrf
<button type="submit" class="btn btn-primary">Réserver</button>
<a href="{{ url('/') }}" class="btn btn-primary">Retour</a>


</form>
@endsection