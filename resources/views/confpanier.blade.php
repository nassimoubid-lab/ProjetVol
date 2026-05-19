@extends('layout')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Le vol a bien été ajouté au panier</h2>
    <form action="{{ route('panierconf') }}" method="POST" class="mt-2">
                @csrf

                <button type="submit" class="btn btn-primary">Aller au panier</button>
            </form>
            <a href="{{ url('/') }}" class="btn btn-primary">Retour</a>


@endsection