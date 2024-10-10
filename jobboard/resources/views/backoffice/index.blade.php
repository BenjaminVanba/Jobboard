@extends('layout')

@section('title', 'Backoffice')

@section('content')

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Tableau de bord du Backoffice</h1>
    
    <ul class="list-disc pl-5">
        <li><a href="{{ route('backoffice_annonces') }}" class="text-blue-500">Voir les annonces</a></li>
        {{-- <li><a href="{{ route('advertisement.index') }}" class="text-blue-500">Lister toutes les annonces</a></li> --}}
        <li><a href="{{ route('companies') }}" class="text-blue-500">Gérer les entreprises</a></li>
        <!-- Ajoutez d'autres liens vers d'autres pages du backoffice -->
    </ul>
</div>

@endsection
