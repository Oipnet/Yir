@extends('layouts.app')

@section('content')
    <h1>Modifier l'annonce :  {{ $annonces->name }}</h1>

    @include('annonces.form', ['action' => 'update'])
@endsection