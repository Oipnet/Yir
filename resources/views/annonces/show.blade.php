@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8">
<img class="zoomable" src="{{ url($annonce->avatar) }}">
  </div>
  <div class="col-md-4 col-sm-12">
<h2><b>{{ $annonce->name }}</b></h2>
    {{ $annonce->price }}€<br/><br/>
     <button type="button" class="btn black-background white btn-lg" data-toggle="modal" data-target="#contact">Contacter</button>
      <br/><br/>
      @if($user->pro == 1)
          <i class="fa fa-industry" aria-hidden="true"></i><br/><br/><span>VENDEUR PROFESSIONNEL </span><br/><br/>
          <a href="{{ route('galerie', $user->name) }}">Voir la galerie du vendeur</a><br/>
      @else
          <i class="fa fa-user" aria-hidden="true"></i><br/><br/><span>VENDEUR PARTICULIER </span><br/><br/>
      @endif
      <br/>
      <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
  </div>
</div>
<br/><br/>
<h4><b>Description</b></h4>
<hr>

    {{ $annonce->description }}<br/>

<br/>
<h4><b>Autre annonces du vendeur</b></h4>
<hr>

@forelse($other as $single)
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

<!-- popup contact -->

     <div class="modal fade" id="contact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Formulaire de contact</h4>
        </div>

        <div class="modal-body">
            <div class="text-center">
             @if($user->lastname)
                <h3>{{  $user->lastname}}</h3>
               <h4>{{  $user->firstname}}</h4>
                @else
                <h5> L'utlisateur n'a pas renseigné son nom/prénom</h5>
                @endif

            @if($user->show_phone == 1)
                <b><i class="fa fa-phone" aria-hidden="true"></i></b> :<span>0{{  $user->phone}}</span><br/>
            @else
               <h5> L'utlisateur n'a pas renseigné son téléphone</h5>
            @endif

<br/>

                 <span>Contacter le vendeur<br/>
                 pour l’annonce :</span><br/>

               <b>"{{ $annonce->name }}"</b>

          </div>
    {!!   Form::open(['route' => ['PostFiche', $annonce->id]]) !!}

    <div class="form-group">
        {!! Form::label('Votre Nom') !!}
        {!! Form::text('name', null,['required','class'=>'form-control','placeholder'=>'Votre Nom']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Votre adresse email') !!}
        {!! Form::text('email', null,['required','class'=>'form-control','placeholder'=>'Votre adresse email']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Votre message') !!}
        {!! Form::textarea('content', null,['required', 'class'=>'form-control',
                  'placeholder'=>'Votre message']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Contactez',
          ['class'=>'btn black-background white']) !!}
    </div>
    {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


   <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            {{ $annonce->name }} - <b>{{ $annonce->price }}€</b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <img src="" class="enlargeImageModalSource" style="width: 100%;">
        </div>
      </div>
    </div>
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  $(function() {
      $('.zoomable').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('#enlargeImageModal').modal('show');
    });
});
</script>
@endsection