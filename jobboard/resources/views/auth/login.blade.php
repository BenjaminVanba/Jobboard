@extends('layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<!-- Section: Design Block -->
<section class="py-5" style="background-color: hsl(0, 0%, 96%);">
  <div class="container">
    <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight">
          Trouvez votre emploi idéal<br />
          <span style="color: #fb246a;">en un clic</span>
        </h1>
        <p style="color: hsl(217, 10%, 50.8%)">
          Explorez des milliers d'offres d'emploi adaptées à vos compétences et à vos aspirations.
          Que vous soyez à la recherche d'un nouveau défi ou d'une première expérience, 
          nous avons des opportunités qui vous attendent !
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card">
          <div class="card-body py-5 px-md-5">
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

              <!-- Password reset link -->
              @if (Route::has('password.request'))
                <div class="text-start mb-2">
                  <a class="forgot-password-link" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                  </a>
                </div>
              @endif

              <!-- Social login buttons -->
              <div class="text-center">
                <p>ou connectez-vous avec :</p>
                <a href="" class="btn btn-link btn-floating mx-1 btn-smaller">
                  <i class="fab fa-google"></i>
                </a>
                <a href="" class="btn btn-link btn-floating mx-1 btn-smaller">
                  <i class="fab fa-github"></i>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<style>
.forgot-password-link {
    color: #007bff; /* Couleur bleue pour le lien */
    text-decoration: underline; /* Soulignement pour simuler un lien */
}

.forgot-password-link:hover {
    color: #0056b3; /* Couleur plus foncée au survol */
    text-decoration: none; /* Retirer le soulignement au survol */
}

.btn-smaller {
    font-size: 0.8rem; /* Ajustez la taille de la police */
    padding: 0.25rem 0.5rem; /* Ajustez les rembourrages pour réduire la taille */
    border-radius: 0.2rem; /* Ajustez le coin arrondi si nécessaire */
}

.form-outline {
    text-align: left; /* S'assure que le texte est à gauche */
}
</style>
@endsection
