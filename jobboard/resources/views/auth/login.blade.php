@extends('layout') <!-- Assurez-vous que le layout est correct -->

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Connexion</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email input -->
        <div class="form-outline mb-2">
            <label class="form-label" for="email">Adresse Email</label>
            <input type="email" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" 
                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="height: 38px; width: 100%;">
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password input -->
        <div class="form-outline mb-2">
            <label class="form-label" for="mot_de_passe">Mot de passe</label>
            <input type="password" id="mot_de_passe" class="form-control form-control-sm @error('mot_de_passe') is-invalid @enderror" 
                name="mot_de_passe" required autocomplete="current-password" style="height: 38px; width: 100%;">
        
            @error('mot_de_passe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Remember me checkbox -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Se souvenir de moi') }}
            </label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4 btn-sm" style="height: 38px; width: 100%;">
            {{ __('Connexion') }}
        </button>
    </form>

    <div class="text-center">
        <p>Vous n'avez pas de compte? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>
    </div>
</div>
@endsection
