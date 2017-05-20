@extends('layouts.app')
@section('content')
    <hr>
    <div class="text-center">
        <h4><b>Vendre</b></h4>

    <hr>


        <p class="regular" style="font-family: Roboto, sans-serif; font-size: 16px;">
            <b>Pour vendre il suffit de...</b>
        </p>

        <br>
        <p class="light" style="font-family: Roboto, sans-serif; font-size: 14px;">
            Créer un compte <br> professionnel ou particulier.
        </p>
        <i class="fa fa-industry" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-user" aria-hidden="true"></i><br><br>
        <p class="light" style="font-family: Roboto, sans-serif; font-size: 14px;">
            Prendre une photo de votre produit. <a href="/modele_photo"><br><br>Voir modèle</a>.
        </p>
        <i class="fa fa-tablet" aria-hidden="true"></i><br><br>
        <p class="light" style="font-family: Roboto, sans-serif; font-size: 14px;">
            Poster gratuitement vos annonces <br> pour une durée de 60 jours <br>via le formulaire de dépôt.
        </p>
        <i class="fa fa-pencil" aria-hidden="true"></i><br><br>
        <p class="light" style="font-family: Roboto, sans-serif; font-size: 14px;">
            Et d'attendre la validation <br> par notre service modération.
        </p>
        <i class="fa fa-search"></i><br><br>
        <p class="regular" style="font-family: Roboto, sans-serif; font-size: 16px;">
            <b>Et c'est fini.</b>
        </p>

        <br><br>

        <button class="btn black-background white btn-lg" style="font-size:10px;"  data-toggle="modal" data-target="#myModal">Créer un compte</button>

        <br><br><br>
    </div>



@endsection