@extends('layout')

@section('title', 'Créer une Personne')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Créer une Nouvelle Personne</h1>

    <form action="{{ route('people.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Prénom</label>
            <input type="text" name="first_name" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nom</label>
            <input type="text" name="last_name" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">E-mail</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Téléphone</label>
            <input type="tel" name="phone" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Mot de Passe</label>
            <input type="password" name="mot_de_passe" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Rôle</label>
            <select name="role" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <option value="applicant">Candidat</option>
                <option value="Manager">Manager</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">ID de l'Entreprise</label>
            <input type="number" name="company_id" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer</button>
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
