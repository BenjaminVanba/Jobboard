@extends('layout')

@section('title', 'Backoffice Entreprises')

@section('content')
<div class="container mx-auto mt-10" style="margin-bottom: 100px;">
    <h1 class="text-3xl font-bold text-center mb-5">Gestion des Entreprises</h1>

    <!-- Message de succès après une action (édition, suppression, etc.) -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des entreprises -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Adresse</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Téléphone</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Site Web</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($companies as $company)
                <tr>
                    <td class="w-1/6 py-3 px-4">{{ $company->name }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $company->address }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $company->email }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $company->phone }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $company->website }}</td>
                    <td class="w-1/6 py-3 px-4">
                        <div class="flex space-x-2">
                        <a href="{{ route('company.edit', $company->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Éditer</a>

                        <!-- Formulaire pour la suppression -->
                        <form action="{{ route('company.delete', $company->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition ml-2">Supprimer</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Lien pour ajouter une nouvelle entreprise -->
    <div class="mt-4">
        <a href="{{ route('company.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Ajouter une nouvelle entreprise</a>
    </div>
</div>
@endsection
