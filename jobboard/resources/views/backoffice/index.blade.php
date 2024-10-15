@extends('layout')

@section('title', 'Backoffice')

@section('content')

<div class="container mx-auto mt-10 p-6 bg-gray-100 rounded-lg shadow-lg" style="margin-bottom: 100px; margin-top:100px">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-gray-800">Tableau de bord du Backoffice</h1>
    
    <ul class="space-y-4">
        <li>
            <a href="{{ route('backoffice_annonces') }}" class="block p-4 rounded-md shadow hover:bg-blue-500 hover:text-white text-blue-500 transition duration-300 ease-in-out">
                Voir les annonces
            </a>
        </li>
        <li>
            <a href="{{ route('companies') }}" class="block p-4 rounded-md shadow hover:bg-blue-500 hover:text-white text-blue-500 transition duration-300 ease-in-out">
                Gérer les entreprises
            </a>
        </li>
        <li>
            <a href="{{ route('people') }}" class="block p-4 rounded-md shadow hover:bg-blue-500 hover:text-white text-blue-500 transition duration-300 ease-in-out">
                Gérer les personnes
            </a>
        </li>
        <li>
            <a href="{{ route('applications') }}" class="block p-4 rounded-md shadow hover:bg-blue-500 hover:text-white text-blue-500 transition duration-300 ease-in-out">
                Gérer les candidatures
            </a>
        </li>
    </ul>
</div>


@endsection
