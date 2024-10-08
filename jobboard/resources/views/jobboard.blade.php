@extends('layout')

@section('title', 'JobBoard')

@section('content')
<h1 class="text-center">Jobboard</h1>



<h1>Liste des entreprises</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone }}</td>
                <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection