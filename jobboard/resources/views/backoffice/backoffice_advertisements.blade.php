@extends('layout')

@section('title', 'Backoffice Annonces')

@section('content')
<div class="container mx-auto mt-10" style="margin-bottom: 100px;">
    <h1 class="text-3xl font-bold text-center mb-5">Gestion des Annonces</h1>
    
    <!-- Message de succès après une action (édition, suppression, etc.) -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Tableau des annonces -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Titre</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Salaire</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Location</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($advertisements as $advertisement)
                <tr>
                    <td class="w-1/6 py-3 px-4">{{ $advertisement->title }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $advertisement->description_courte }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $advertisement->salary }} €</td>
                    <td class="w-1/6 py-3 px-4">{{ $advertisement->location }}</td>
                    <td class="w-1/6 py-3 px-4">
                        <a href="{{ route('advertisement.edit', $advertisement->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Éditer</a>
                        
                        <!-- Formulaire pour la suppression -->
                        <form action="{{ route('advertisement.delete', $advertisement->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition ml-2">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Lien pour créer une nouvelle annonce -->
    <div class="mt-4">
        <a href="{{ route('advertisement.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Ajouter une nouvelle annonce</a>
    </div>
</div>
@endsection
