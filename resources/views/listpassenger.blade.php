@extends('layoutAdmin')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
    <a href="{{ url('/compte') }}" class="btn btn-outline-primary mb-2">Retour</a>
    <h2 class="mb-4">Liste des réservations</h2>

    @foreach($listreservation as $element)
        <div class="card mb-3 p-3">
            <b>Nom :</b> {{ $element->resPassenger->last_name}}<br>

            <b>Prénom :</b> {{ $element->resPassenger->first_name}}<br>

            <b>Vol :</b>
            @if ($element->resVol)
                {{ $element->resVol->name }}
            @else
                <span class="text-danger">Vol supprimé</span>
            @endif
        </div>
    @endforeach

</div>
@endsection
