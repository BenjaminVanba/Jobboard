@extends('layout')

@section('title', 'JobBoard')

@section('content')

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-5">Liste des Annonces</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($advertisements as $advertisement)
            <div class="bg-white shadow-lg rounded-lg p-5 transition-transform duration-200 hover:shadow-xl hover:scale-105">
                <h2 class="text-xl font-semibold text-gray-800">{{ $advertisement->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $advertisement->description_courte }}</p>
                <div class="text-sm text-gray-400"><p>Crée le : {{$advertisement->created_at}}</p>
                <p>Mis a jour le : {{$advertisement->updated_at}}</p></div>
                <p class="text-gray-800 mt-4 font-medium">Salaire: <span class="text-green-600">{{ $advertisement->salary }} €</span></p>
                <p class="text-gray-800 mt-1">Location: {{ $advertisement->location }}</p>
                <p class="text-gray-800 mt-1">Entreprise: <span class="font-semibold">{{ $advertisement->company->name }}</span></p>
                <p class="text-gray-600">Email Entreprise: <a href="mailto:{{ $advertisement->company->email }}" class="text-blue-500">{{ $advertisement->company->email }}</a></p>
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('apply', $advertisement->id) }}" class="btn btn-primary">Postuler</a>
                    <a href="#" class="text-gray-600 ml-2 hover:text-blue-600 view-more" data-id="{{ $advertisement->id }}">Voir plus</a>
                </div>
                <div class="description-longue mt-2 hidden" id="description-{{ $advertisement->id }}">
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection