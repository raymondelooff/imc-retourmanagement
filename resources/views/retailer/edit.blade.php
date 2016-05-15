@extends('layouts.master')
@section('back', url('user', $retailer->id))
@section('title', 'Wijzig retailer')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h2>{{ $retailer->name }}</h2>

            {!! Form::model($retailer, [
                'method' => 'PATCH',
                'url' => ['retailer', $retailer->id],
                'class' => 'form-horizontal'
            ]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    {!! Form::button('Retailer wijzigen', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    <a href="{{ url('retailer/' . $retailer->id) }}" class="btn btn-danger">Annuleren</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection