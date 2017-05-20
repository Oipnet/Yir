@extends('layouts.app')

@section('content')

 <hr>
 <div class="text-center">
  <span><b>Contactez-nous</span>
 </div>
 <hr>
 <h5>Des commentaires, des questions, des compliments...</h5>
 {!! Form::open(['route' => 'contact_send', 'class' => 'form']) !!}

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
  {!! Form::submit('Contactez nous',
    array('class'=>'btn black-background white')) !!}
 </div>
 {!! Form::close() !!}
@endsection