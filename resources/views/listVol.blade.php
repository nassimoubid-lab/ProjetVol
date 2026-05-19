@extends('layoutAdmin')

@section('title', 'Accueil')

@section('content')
<div class="container mt-4">
    <a href="{{ url('/compte') }}" class="btn btn-outline-primary mb-2">Retour</a>

    <h2 class="mb-4">Liste des vols</h2>
    @if (count($listvols) >= 1)
        @foreach($listvols as $element)
            <div class="card mb-3 p-3">
                <b>Nom :</b> {{ $element->name }}<br>


                <form action="{{ route('modify') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id_vol" value="{{$element->id}}">
                    <button type="submit" class="btn btn-success">Modifier</button>
                </form>

                <form action="{{ route('deletePage') }}" method="POST" class="mt-2">
                    @csrf
                    <input type="hidden" name="id_vol" value="{{$element->id}}">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

            </div>
        @endforeach
    @else
        <p> Aucun vol disponible.</p>
    @endif

</div>
@endsection
