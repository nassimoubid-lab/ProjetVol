@extends('layout')

@section('title', 'Vols')

@section('content')
<form action="{{ route('recap') }}" method="POST">
    <label>Prénom</label>
    <input type="text" name="first_name" class="form-control" required>
    @csrf

    <label>Nom</label>
    <input type="text" name="last_name" class="form-control" required>

    <label>Email</label>
    <input type="email" name="email" class="form-control" required>

    
    <input type="submit" value="Confirmer" class="btn btn-primary mt-3">
    
</form>

@endsection
