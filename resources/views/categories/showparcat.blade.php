@extends('layouts.app')
@section('content')
    <hr>
    <div class="text-center">
        <span><b>{{ $cat->name }}</b> {{ $compteur }} Résultat(s)</span>
    </div>
    <hr>

    <div class="dropdown pull-right">
        <button class="btn dropdown-toggle delete_style" type="button" data-toggle="dropdown">TRIER PAR :
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="">Annonce Pro</a></li>
            <li><a href="">Annonce particulier</a></li>
            <li><a href="#">Toute les annonces</a></li>
        </ul>
    </div><br/><br/><br/>

        @forelse($annonces as $ads)
            <div class="row">
            <div class="col-sm-4">
                <div class="pull-left">
                <a href="{{ route('annonces.show', ['id' => $ads->id]) }}">
                    <img src="{{ url($ads->avatar_mini) }}"/>
                </a>
                </div>
            </div>
            <div class="col-sm-1">
                <b>{{ $ads->name }}</b><br/><br/>
                {{ $ads->price }} €
            </div>

        </div>

<br/>
        @empty
    </div>

    <li class="text-white">aucune annonce dans cette catégorie</li>
@endforelse


@endsection