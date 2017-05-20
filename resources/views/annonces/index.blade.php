@extends('layouts.app')

@section('content')


    <h6>Gestion de vos annonces</h6>
    <p class="text-right">
        @if(Auth::user() &&  Auth::user()->validate == true)
            <a href="{{ action('AnnoncesController@create') }}" class="btn black-background white" style="color:white !important" >Ajoutez une une annonce</a>
    </p>

    <table class="table table-striped table-responsive">
        <thead>
        <tr>

            <th>Titre</th>
            <th>price</th>
            <th>Etat</th>
            <th>Hit</th>
            <th>user_id</th>
            <th>Avatar</th>
            <th>Expiration</th>
        </tr>

        </thead>
        <tbody>
        @foreach($annonces as $ads)
            <tr>
                 <td><a href="{{ route('annonces.show', $ads->id) }}">{{ $ads->name }}</a></td>
                 <td>{{ $ads->price }}&nbsp;€</td>
                <td>
                    @if($ads->validate == '1')
                        <span class="label label-success">Validé</span>
                    @elseif($ads->validate == '0')
                        <span class="label label-warning">en attente</span>
                        @else
                        <span class="label label-danger">refusé</span>
                    @endif
                </td>
                <td>{{ $ads->hit }}</td>
                <td>{{ $ads->user_id }}</td>

                <td><img src="{{ url($ads->avatar) }}?{{ time() }}" class="img-thumbnail" style="width: 100px;"></td>
                <td>
                    {{ $ads->expirationTime }}
                </td>

             <td>
                 @if($ads->validate == '1')
                 <a class="btn btn-primary" href="{{ action('AnnoncesController@edit', $ads) }}">Editer</a>
                     <a class="btn btn-danger" href="{{ action('AnnoncesController@destroy', $ads) }}" data-method="delete" data-confirm="Etes vous sur de vouloir supprimer ? ">Supprimer</a>
                 @endif

                 @if($ads->isExpiredAds == true)
                     <a class="btn btn-danger" href="{{ action('AnnoncesController@renew', $ads) }}">Renouveller</a>
                 @endif
             </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Informations</h4>
            <p>Désolé votre compte n'a pas encore été validé</a>.<br/>Veuillez attendre la validation de notre administrateur</p>
        </div>
    @endif
@endsection