@extends('layouts.app')


@section('content')
<span>GALERIE</span>&nbsp;<b>{{ $user->name }}</b><br/>
<span>{{ $user->description }}</span><br/><br/>
@if($user->show_phone == 1)
    <b><i class="fa fa-phone" aria-hidden="true"></i></b> :<span>0{{  $user->phone}}</span><br/><br/>
@else
    <i class="fa fa-phone" aria-hidden="true"></i><span> Aucun numéro </span><br/><br/>
@endif

<hr>
<br/>

@forelse($annonces as $single)
    <div class="row">
        <div class="col-sm-4">
            <div class="pull-left">
                <a href="{{ route('annonces.show', ['id' => $single->id]) }}">
                    <img src="{{ url($single->avatar_mini) }}"/>
                </a>
            </div>
        </div>
        <div class="col-sm-1">
            <b>{{ $single->name }}</b><br/><br/>
            {{ $single->price }} €
        </div>

    </div>

    <br/>
    @empty
    </div>

    <li class="text-white">Ce vendeur n'a aucune autre annonce</li>
@endforelse
@endsection