@extends('layout')

@section('content')
<div class="container">
    <h1>Postuler pour : {{ $advertisement->title }}</h1>

    <form method="POST" action="{{ route('job.submitApplication', $advertisement->id) }}" enctype="multipart/form-data">
        @csrf

        <!-- Champ caché pour l'ID de l'offre d'emploi -->
        <input type="hidden" name="advertisement_id" value="{{ $advertisement->id }}">

        <div class="form-group">
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user ? $user->first_name : '' }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Nom de Famille</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user ? $user->last_name : '' }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user ? $user->email : '' }}" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Numéro de téléphone -->
        <div class="form-group">
            <label for="phone">Numéro de Téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user ? $user->phone : '' }}" required>
            @error('phone')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- CV -->
        <div class="form-group">
            <label for="cv">CV (PDF, DOC, DOCX)</label>
            <input type="file" name="cv" id="cv" class="form-control @error('cv') is-invalid @enderror" accept=".pdf,.doc,.docx" required>
            @error('cv')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Lettre de motivation -->
        <div class="form-group">
            <label for="cover_letter">Lettre de Motivation (facultatif)</label>
            <textarea name="cover_letter" id="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror" rows="4"></textarea>
            @error('cover_letter')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bouton soumettre -->
        <button type="submit" class="btn btn-primary">Postuler</button>
    </form>
</div>
@endsection
