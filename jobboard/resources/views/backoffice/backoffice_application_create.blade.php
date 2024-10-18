@extends('layout')

@section('title', 'Créer une Candidature')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-5">Créer une nouvelle Candidature</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire de création d'une application -->
    <form action="{{ route('applications.store') }}" method="POST" class="max-w-xl mx-auto space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="first_name" class="block text-gray-700 font-bold mb-2">Prénom :</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div>
            <label for="last_name" class="block text-gray-700 font-bold mb-2">Nom :</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div>
            <label for="email" class="block text-gray-700 font-bold mb-2">Email :</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div>
            <label for="phone" class="block text-gray-700 font-bold mb-2">Téléphone :</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex flex-col">
            <label for="status" class="block text-gray-700 font-bold ">Statut :</label>
            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="pending">En attente</option>
                <option value="reviewed">Revue</option>
                <option value="accepted">Acceptée</option>
                <option value="rejected">Rejetée</option>
            </select>
            <div class="mt-4">
                <label for="advertisement_id" class="block text-gray-700 font-bold mb-2">ID de l'annonce :</label>
                <input type="number" name="advertisement_id" id="advertisement_id" class="w-full border border-gray-300 rounded px-4 py-2" required>
            </div>
        </div>


        <div>
            <label for="cv" class="block text-gray-700 font-bold mb-2">CV (fichier) :</label>
            <input type="file" name="cv" id="cv" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div>
            <label for="cover_letter" class="block text-gray-700 font-bold mb-2">Lettre de motivation :</label>
            <textarea name="cover_letter" id="cover_letter" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" cols="30" rows="10">{{ old('cover_letter') }}</textarea>
        </div>

        <div class="text-center mb-4">
            <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 focus:outline-none focus:shadow-outline">
                Créer la Candidature
            </button>
        </div>
    </form>
</div>
@endsection
