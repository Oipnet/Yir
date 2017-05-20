@extends('layouts.app')

@section('content')


    <h6>Listings des annonces</h6>
    <table class="table table-striped">
        <thead>
        <tr>

            <th>ID</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Role</th>
            <th>Image</th>
            <th>Etat</th>
        </tr>

        </thead>
        <tbody>
        @foreach($annonces as $ads)
            <tr>
                <td>{{ $ads->id }}</td>
                <td>{{ $ads->name }}</td>
                <td>{{ $ads->price }}</td>
                <td>
                    @if($ads->pro == false)
                        Particulier
                    @else
                        Professionnel
                    @endif
                </td>
                <td>
                    @if($ads->avatar == true)
                        <img src="{{ url($ads->avatar) }}?{{ time() }}" class="img-thumbnail" style="width: 100px;">
                    @else
                        Aucun
                    @endif
                </td>
                <td>
                    @if($ads->validate == '1')
                        <span class="label label-success">Validé</span>
                    @elseif($ads->validate =='0')
                        <span class="label label-warning">en attente</span>
                        @else
                        <span class="label label-danger">Refusé</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ action('AdminController@PostValidationAnnonces', $ads) }}">Activer</a>
                    <a class="btn btn-danger" href="{{ action('AdminController@DisableAnnonces', $ads) }}" data-method="get" data-confirm="Etes vous sur de vouloir passer l'utilisateur en attente ? ">Désactiver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection