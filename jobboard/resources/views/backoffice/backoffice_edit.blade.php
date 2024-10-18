@extends('layout')
@section('title', 'Éditer l\'annonce')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Éditer l'annonce</h1>
    
    <form action="{{ route('advertisement.update', $advertisement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Titre</label>
            <input type="text" name="title" value="{{ $advertisement->title }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description Courte</label>
            <textarea name="description_courte" class="w-full border border-gray-300 rounded px-4 py-2" required>{{ $advertisement->description_courte }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Description Longue</label>
            <textarea name="description_longue" class="w-full border border-gray-300 rounded px-4 py-2" required>{{ $advertisement->description_longue }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Salaire</label>
            <input type="number" name="salary" value="{{ $advertisement->salary }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lieu</label>
            <input type="text" name="location" value="{{ $advertisement->location }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Entreprise ID</label>
            <input type="number" name="company_id" value="{{ $advertisement->company_id }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Posté par</label>
            <select name="posted_by" class="w-full border border-gray-300 rounded px-4 py-2" required>
                <option value="" disabled>Choisissez un manager</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" 
                        {{ $manager->id == $advertisement->posted_by ? 'selected' : '' }}>
                        {{ $manager->first_name }} {{ $manager->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Bouton de soumission pour l'édition -->
        <div class="mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800">Mettre à jour</button>
        </div>
        
    </form>
</div>
@endsection
