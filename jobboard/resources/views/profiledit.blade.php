@extends('layout')

@section('content')
<div class="container">
    <h1>Modifier mon compte</h1>

    <!-- Afficher les messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Afficher les erreurs de validation -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire de mise à jour du profil -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <div class="form-group">
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Nom de Famille</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Numéro de Téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
