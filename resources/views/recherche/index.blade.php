@extends('layouts.app')
@section('content')
    <hr>
    <div class="text-center">
        <span><b>Nombre de résultat(s) :</b> {{ $compteur }}</span>
    </div>
    <hr>

    <div class="dropdown pull-right">
        <button class="btn dropdown-toggle delete_style" type="button" data-toggle="dropdown">TRIER PAR
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{ route('recherche', ['pro' => 1]) }}">Annonce Pro</a></li>
            <li><a href="{{ route('recherche', ['pro' => 0]) }}">Annonce particulier</a></li>
            <li><a href="{{ route('recherche') }}">Toute les annonces</a></li>
        </ul>
    </div><br/><br/><br/>

    @forelse($annonces as $ads)
        <div class="row">
            <div class="col-sm-4">
                <div class="pull-left">
                    <a class="thumbnail" style="border:none;" href="{{ route('annonces.show', ['id' => $ads->id]) }}">
                        <img  src="{{ url($ads->avatar_mini) }}"/>
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <b>{{ $ads->name }}</b><br/><br/>
                {{ $ads->price }} €
            </div>

        </div>

        <br/>
        @empty
        </div>

        <li class="text-white">aucune annonce pour la recherche "{{ $keyword }}"</li>
    @endforelse


@endsection