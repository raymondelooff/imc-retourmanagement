@extends('layouts.master')
@section('title', 'Gebruiker toevoegen')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('user') }}">
            <i class="fa fa-chevron-left "></i><span class="hidden-xs hidden-sm">Terug naar het overicht</span>
        </a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            {!! Form::open(['url' => 'user', 'class' => 'form-horizontal']) !!}

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
                {!! Form::label('retailer', 'Retailer ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('retailer', ['1' => 'Retailer 1', '2' => 'Retailer 2'], null, ['class' => 'form-control']) !!}
                    {!! $errors->first('retailer', '<p class="help-block">:message</p>') !!}
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
                    {!! Form::button('Gebruiker aanmaken', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection