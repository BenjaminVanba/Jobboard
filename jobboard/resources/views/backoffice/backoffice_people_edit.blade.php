@extends('layout')

@section('title', 'Éditer une Personne')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Modifier les Informations de {{ $person->first_name }} {{ $person->last_name }}</h1>

    <form action="{{ route('people.update', $person->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Prénom</label>
            <input type="text" name="first_name" value="{{ $person->first_name }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nom</label>
            <input type="text" name="last_name" value="{{ $person->last_name }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">E-mail</label>
            <input type="email" name="email" value="{{ $person->email }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Téléphone</label>
            <input type="tel" name="phone" value="{{ $person->phone }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Rôle</label>
            <select name="role" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <option value="applicant" {{ $person->role == 'applicant' ? 'selected' : '' }}>Candidat</option>
                <option value="manager" {{ $person->role == 'manager' ? 'selected' : '' }}>Manager</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">ID de l'Entreprise</label>
            <input type="number" name="company_id" value="{{ $person->company_id }}" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nouveau Mot de Passe (optionnel)</label>
            <input type="password" name="mot_de_passe" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>

    @if ($errors->any())
        <div class="mt-4">
            <ul class="text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection
