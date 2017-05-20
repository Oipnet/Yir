@extends('layouts.app')

@section('content')
<h1>Ajoutez une nouvelle annonce</h1>

    @include('annonces.form', ['action' => 'store'])
@endsection