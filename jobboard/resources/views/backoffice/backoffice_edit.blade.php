@extends('layout')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Modifier l'annonce</h1>

    <form action="{{ route('advertisement.update', $advertisement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Titre</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $advertisement->title }}" required>
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
            <input type="number" name="salary" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $advertisement->salary }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Lieu</label>
            <input type="text" name="location" class="w-full border border-gray-300 rounded px-4 py-2" value="{{$advertisement->location}}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-800 mb-4">Mettre à jour</button>
    </form>
    @if ($errors->any())
    <div class="mb-4">
        <ul class="text-red-500">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
@endsection
