@extends('layouts.app')

@section('content')
    <h6>Listings des utilisateurs</h6>
    <table class="table table-striped">
        <thead>
        <tr>

            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Nom de galerie</th>
            <th>Pro/Part</th>
            <th>Avatar</th>
            <th>Etat</th>
        </tr>

        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>  @if($user->lastname == null)
                        Non renseigné
                      @else
                        {{ $user->lastname }}
                      @endif
                </td>
                <td>

                    @if($user->firstname == null)
                        Non renseigné
                    @else
                        {{ $user->firstname }}
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>
                    @if($user->pro == false)
                        Particulier
                    @else
                        Professionnel
                    @endif
                </td>
                <td>
                    @if($user->avatar == true)
                    <img src="{{ url($user->avatar) }}?{{ time() }}" class="img-thumbnail" style="width: 100px;">
                    @else
                    Aucun
                    @endif
                </td>
                <td>
                    @if($user->validate == '1')
                        <span class="label label-success">Validé</span>
                    @elseif($user->validate == '0')
                        <span class="label label-warning">en attente</span>

                    @else
                        <span class="label label-danger">Banni</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ action('AdminController@PostValidation', $user) }}">Valider</a>
                    <a class="btn btn-danger" href="{{ action('AdminController@Bannir', $user) }}" data-method="get" data-confirm="Etes vous sur de vouloir passer l'utilisateur en attente ? ">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            {{ $users->links() }}
        </div>
    </div>

@endsection