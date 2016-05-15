@extends('layouts.master')
@section('back', url('user', $user->id))
@section('title', 'Wijzig gebruiker')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h2>{{ $user->name }}</h2>

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

            <div class="form-group">
                {!! Form::label('activated', 'Account status ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('activated', [1 => 'Geactiveerd', 0 => 'Gedeactiveerd'], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('retailer') ? 'has-error' : ''}}">
                {!! Form::label('retailer', 'Retailer ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('retailer', ['1' => 'Retailer 1', '2' => 'Retailer 2'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('retailer', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('user_role') ? 'has-error' : ''}}">
                {!! Form::label('user_role', 'Rol ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('user_role', $user_roles_values, null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_role', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    {!! Form::button('Gebruiker wijzigen', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    <a href="{{ url('user/' . $user->id) }}" class="btn btn-danger">Annuleren</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection