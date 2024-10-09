@extends('layout')

@section('title', 'Accueil')

@section('content')
<h1 class="text-center">Bienvenue sur la page d'accueil</h1>
<a class="text-center block mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('jobboard') }}">jobboard ici</a>
@endsection