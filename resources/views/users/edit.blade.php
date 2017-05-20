@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{__('messages.account') }}</div>
            <div class="panel-body">
                {!! Form::model($user,['class' => 'form-horizontal','files'=> true ,route('postProfil')]) !!}
                <!-- champ email desactive -->
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        {{ Form::text('email', null, ['class' => 'form-control', 'disabled']) }}
                    </div>
                </div>
                    <!-- fin champ email-->

                <div class="form-group">
                    <label for="avatar" class="col-md-4 control-label ">{{__('messages.avatar_profil') }} </label>
                    <div class="col-md-6">
                        @if($user->avatar)
                                <img style="height: 150px; width: 150px;" src="{{ url($user->avatar) }}"/>
                            @endif
                        {{ Form::file('avatar', ['class' => 'form-control btn btn-file', ]) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-md-4 control-label">{{__('messages.label_lastname') }}</label>
                    <div class="col-md-6">
                        {{ Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-md-4 control-label">{{__('messages.label_firstname') }}</label>
                    <div class="col-md-6">
                        {{ Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname']) }}
                    </div>
                </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-4 control-label">Numéro de téléphone</label>
                        <div class="col-md-6">
                            {{ Form::number('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_phone" class="col-md-4 control-label">Afficher votre numéro de téléphone</label>
                        <div class="material-switch col-md-6 pull-left">
                            {!! Form::checkbox('show_phone', '1', null, ['id' => 'someSwitchOptionDefault']) !!}
                            <label for="someSwitchOptionDefault" class="label-default"></label>
                        </div>
                    </div>
<!-- pro -->
                    @if(Auth::user() &&  Auth::user()->role == "pro")
                    <div class="form-group">
                        <label for="siret" class="col-md-4 control-label">Siret/Siren</label>
                        <div class="col-md-6">
                            {{ Form::number('siret', null, ['class' => 'form-control', 'id' => 'siret']) }}
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nom de votre galerie</label>
                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                            </div>
                        </div>

                    @endif
                    <!--fin pro  -->


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn black-background white">
                            {{__('messages.update') }}
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
    </div>
 @endsection