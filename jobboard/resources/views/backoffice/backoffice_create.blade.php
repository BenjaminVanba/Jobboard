@extends('layout')
@section('title', 'Créer une nouvelle annonce')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Créer une nouvelle annonce</h1>
    
    <form action="{{ route('advertisement.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Titre</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description Courte</label>
            <textarea name="description_courte" class="w-full border border-gray-300 rounded px-4 py-2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description Longue</label>
            <textarea name="description_longue" class="w-full border border-gray-300 rounded px-4 py-2" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Salaire</label>
            <input type="number" name="salary" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lieu</label>
            <input type="text" name="location" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Entreprise ID</label>
            <input type="number" name="company_id" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4 flex flex-col">
            <label class="block text-gray-700">Posté par</label>
            <select name="posted_by" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <option value="" disabled selected>Choisissez un manager</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                @endforeach
            </select>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800">Créer</button>
            </div>        
        </div>
    </form>
</div>
@endsection
