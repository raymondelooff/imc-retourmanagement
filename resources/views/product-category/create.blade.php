@extends('layouts.master')
@section('back', url('product-category'))
@section('title', 'Productcategorie toevoegen')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            {!! Form::open(['url' => 'product-category', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                {!! Form::label('category', 'Categorie: ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('productstatus') ? 'has-error' : ''}}">
                {!! Form::label('productstatus', 'Productstatus: ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('productstatus', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('productstatus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('productorigin') ? 'has-error' : ''}}">
                {!! Form::label('productorigin', 'Herkomst van product: ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('productorigin', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('productorigin', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                    {!! Form::submit('Productcategorie aanmaken', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection