@extends('layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@section('content')
<!-- Section: Design Block -->
<section class="py-5" style="background-color: hsl(0, 0%, 96%);">
  <div class="container">
    <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="my-5 display-3 fw-bold ls-tight">
          Créez votre compte<br />
        </h1>
        <p style="color: hsl(217, 10%, 50.8%)">
          Rejoignez notre plateforme et commencez à explorer des milliers d'opportunités d'emploi qui vous attendent.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card">
          <div class="card-body py-5 px-md-5">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <!-- First Name input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="first_name">Prénom</label>
                <input id="first_name" type="text" class="form-control form-control-sm @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus style="height: 38px; width: 100%;">
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Last Name input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="last_name">Nom</label>
                <input id="last_name" type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" style="height: 38px; width: 100%;">
                @error('last_name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Email input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="email">Adresse Email</label>
                <input type="email" id="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="height: 38px; width: 100%;">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Phone input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="phone">Téléphone</label>
                <input id="phone" type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" style="height: 38px; width: 100%;">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Role input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="role">Rôle</label>
                <select id="role" name="role" class="form-control form-control-sm @error('role') is-invalid @enderror" required style="height: 38px; width: 100%;">
                  <option value="applicant">Candidat</option>
                  <option value="manager">Manager</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" class="form-control form-control-sm @error('mot_de_passe') is-invalid @enderror" name="mot_de_passe" required autocomplete="new-password" style="height: 38px; width: 100%;">
                @error('mot_de_passe')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Confirm Password input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="mot_de_passe_confirmation">Confirmer le mot de passe</label>
                <input id="mot_de_passe_confirmation" type="password" class="form-control form-control-sm" name="mot_de_passe_confirmation" required autocomplete="new-password" style="height: 38px; width: 100%;">
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4" style="height: 38px; width: 100%;">
                {{ __('S\'inscrire') }}
              </button>

              <!-- Social login buttons -->
               
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .btn-smaller {
      font-size: 0.8rem; /* Ajustez la taille de la police */
      padding: 0.25rem 0.5rem; /* Ajustez les rembourrages pour réduire la taille */
      border-radius: 0.2rem; /* Ajustez le coin arrondi si nécessaire */
  }
  
  .form-outline {
      text-align: left; /* Assure que le texte est à gauche */
  }
</style>
@endsection
