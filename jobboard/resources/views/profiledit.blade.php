@extends('layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Modifier mon compte</h1>

    <!-- Afficher les messages de succès -->
    @if(session('success'))
        <div class="alert alert-success text-center">
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
    <form method="POST" action="{{ route('profile.update') }}" class="mx-auto" style="max-width: 600px;">
        @csrf

        <div class="form-group mb-3">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="last_name" class="form-label">Nom de Famille</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone" class="form-label">Numéro de Téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">Nouveau Mot de Passe (facultatif)</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrez un nouveau mot de passe">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group mb-4">
            <label for="password_confirmation" class="form-label">Confirmer le Mot de Passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmez le mot de passe">
        </div>

        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
    </form>
</div>

<!-- Custom Styles -->
<style>
    .container {
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }
    .form-label {
        font-weight: bold;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
@endsection
