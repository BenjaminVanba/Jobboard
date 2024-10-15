@extends('layout')

@section('title', 'Backoffice Applications')

@section('content')
<div class="container mx-auto mt-10" style="margin-bottom: 100px;">
    <h1 class="text-3xl font-bold text-center mb-5">Gestion des Candidatures</h1>

    <!-- Message de succès après une action (édition, suppression, etc.) -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des applications -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">ID de l'annonce</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Prénom</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Téléphone</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Statut</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">CV</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Motivation</th>
                    <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($applications as $application)
                <tr>
                    <td class="w-1/6 py-3 px-4">{{ $application->advertisement_id }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $application->last_name }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $application->first_name }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $application->email }}</td>
                    <td class="w-1/6 py-3 px-4">{{ $application->phone }}</td>
                    <td class="w-1/6 py-3 px-4">{{ ucfirst($application->status) }}</td>
                    <td class="w-1/6 py-3 px-4">
                        <a href="{{ Storage::url($application->cv) }}" target="_blank">{{ ucfirst(basename($application->cv)) }}</a>
                    </td>
                                        <td class="w-1/6 py-3 px-4">
                        {{ \Illuminate\Support\Str::limit($application->cover_letter, 50) }}
                    </td>
                                        <td class="w-1/6 py-3 px-4">
                        <a href="{{ route('applications.edit', $application->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">Éditer</a>

                        <!-- Formulaire pour la suppression -->
                        <form action="{{ route('applications.delete', $application->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette application ?');">
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

    <!-- Lien pour ajouter une nouvelle application -->
    <div class="mt-4">
        <a href="{{ route('applications.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Ajouter une nouvelle application</a>
    </div>
</div>
@endsection
