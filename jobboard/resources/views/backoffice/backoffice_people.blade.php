@extends('layout')

@section('title', 'Backoffice People')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-5">Gestion des Personnes</h1>
    
    <!-- Message de succès après une action (édition, suppression, etc.) -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Tableau des personnes -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Prénom</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">E-mail</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Téléphone</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Rôle</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Entreprise</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($people as $person)
                <tr>
                    <td class="w-1/6 py-3 px-4">{{ $person->first_name }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $person->last_name }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $person->email }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $person->phone }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $person->role }}</td>
                    <td class="w-1/6 py-3 px-4">
                        {{ $person->company ? $person->company->name : 'Liée à aucune entreprise' }}
                    </td>
                    <td class="w-1/6 py-3 px-4">
                        <a href="{{ route('people.edit', $person->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Éditer</a>
                        
                        <!-- Formulaire pour la suppression -->
                        <form action="{{ route('people.delete', $person->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette personne ?');">
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
    
    <!-- Lien pour créer une nouvelle personne -->
    <div class="mt-4">
        <a href="{{ route('people.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Ajouter une nouvelle personne</a>
    </div>
</div>
@endsection
