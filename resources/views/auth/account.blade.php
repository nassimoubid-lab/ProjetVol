@extends('layoutAdmin')

@section('title', 'Espace privé')

@section('content')
<div class="container mt-4">
    <div class="card" style="background-color: #333; border: 1px solid #ccc; padding: 20px;">
        <div class="card-body text-white">
            <div class="text-center mb-5">
                <h1 class="mb-3">Espace Admin</h1>

                @auth
                    <h4>Bonjour <strong>{{ Auth::user()->name }}</strong>,</h4>
                    <p>Bienvenue sur votre espace privé </p>
                @endauth
            </div>

            @auth
                <div class="row g-3">
                    <div class="col-md-12">
                        <a href="{{ url('/formVol') }}" class="btn btn-primary w-100 mb-2" style="border-bottom: 1px solid #ccc;">Ajouter un vol</a>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ url('/modify') }}" class="btn btn-primary w-100 mb-2" style="border-bottom: 1px solid #ccc;">Modifier ou supprimer un vol</a>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ url('/listpassenger') }}" class="btn btn-primary w-100 mb-2" style="border-bottom: 1px solid #ccc;">Liste des réservations</a>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ url('/seatstaken') }}" class="btn btn-primary w-100 mb-2" style="border-bottom: 1px solid #ccc;">Liste des places/vol</a>
                    </div>
                </div>
            @endauth

            <div class="row mt-3">
                <div class="col-md-4 offset-md-4 text-start">
                    <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger w-100">Se déconnecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
