@extends('layout')

@section('title', 'Créer une Application')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Modifier une candidature</h1>

    <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="mb-4">
            <label class="block text-gray-700">Prénom</label>
            <input type="text" name="first_name" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $application->first_name }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nom</label>
            <input type="text" name="last_name" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $application->last_name }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">E-mail</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $application->email }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Téléphone</label>
            <input type="tel" name="phone" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $application->phone }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">CV (PDF, DOC, DOCX)</label>
            <input type="file" name="cv" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lettre de Motivation</label>
            <textarea name="cover_letter" class="w-full border border-gray-300 rounded px-4 py-2">{{ old('cover_letter', $application->cover_letter) }}</textarea>
        </div>
        

        <div class="mb-4">
            <label class="block text-gray-700">ID de l'Annonce</label>
            <input type="number" name="advertisement_id" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $application->advertisement_id }}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800 mb-4">Soumettre</button>
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
