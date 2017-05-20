@extends('layouts.app')

@section('content')


    <h1>Gerer les catégories</h1>
    <p class="text-right">
        <a href="{{ action('CategoriesController@create') }}" class="btn btn-primary" >Ajoutez une categorie</a>

    </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>

        </thead>
        <tbody>
        @foreach($categories as $cat)
            <tr>
             <td>{{ $cat->id }}</td>
             <td>{{ $cat->name }}</td>
             <td>{{ $cat->slug }}</td>
             <td>
                 <a class="btn btn-primary" href="{{ action('CategoriesController@edit', $cat) }}">Editer</a>
                 <a class="btn btn-danger" href="{{ action('CategoriesController@destroy', $cat) }}" data-method="delete" data-confirm="Etes vous sur de vouloir supprimer ? ">Supprimer</a>
             </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection