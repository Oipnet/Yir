@extends('layouts.app')

@section('content')
    <h1>Modifier la catégorie {{ $categories->name }}</h1>

    @include('categories.form', ['action' => 'update'])
@endsection