@extends('layouts.app')

@section('content')
<h1>Ajoutez une catégorie</h1>

    @include('categories.form', ['action' => 'store'])
@endsection