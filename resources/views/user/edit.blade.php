@extends('layouts.master')
@section('title', 'Gebruiker wijzigen')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['user', $user->id],
                'class' => 'form-horizontal'
            ]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Naam ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'E-mailadres ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('user_role') ? 'has-error' : ''}}">
                {!! Form::label('user_role', 'Rol ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('user_role', ['1' => 'Normale gebruiker', '2' => 'Retailer'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_role', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    {!! Form::button('Bewerk', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    <a href="{{ url('user/' . $user->id) }}" class="btn btn-danger">Annuleren</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection