@extends('layout')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-5">Modifier l'entreprise</h1>

    <form action="{{ route('company.update', $companies->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nom de l'entreprise</label>
            <input type="text" name="name" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $companies->name }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Adresse</label>
            <textarea name="address" class="w-full border border-gray-300 rounded px-4 py-2" required>{{ $companies->address }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">E-mail</label>
            <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2" value="{{ $companies->email }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Téléphone</label>
            <input type="tel" name="phone" class="w-full border border-gray-300 rounded px-4 py-2" pattern="[0-9]{10}" value="{{ $companies->phone }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Site internet</label>
            <input type="url" name="website" class="w-full border border-gray-300 rounded px-4 py-2" value="{{$companies->website}}" required>
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
