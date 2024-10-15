@extends('layout')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Créer une nouvelle entreprise</h1>
    
    <form action="{{ route('company.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nom de l'entreprise</label>
            <input type="text" name="name" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Adresse</label>
            <input type="text" name="address" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Téléphone</label>
            <input type="tel" name="phone" class="w-full border border-gray-300 rounded px-4 py-2" pattern="[0-9]{10}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Site internet</label>
            <input type="url" name="website" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800 mb-4 ">Créer</button>
    </form>
</div>
@endsection
