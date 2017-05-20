@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inscription</div>
                <div class="panel-body">
                    {!! Form::open(['class' => 'form-horizontal', url('/auth/register')]) !!}
                        {{ csrf_field() }}

                   {{--     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom d'utilisateur</label>

                            <div class="col-md-6">
                                {{ Form::text('name', null, ['class' => 'form-control']) }}


                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{ __('messages.email') }}</label>

                            <div class="col-md-6">
                                {{ Form::email('email', null, ['class' => 'form-control']) }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{ __('messages.password') }}</label>

                            <div class="col-md-6">
                                {{ Form::password('password', ['class' => 'form-control']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmation mot de passe</label>

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation',['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn black-background white">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
