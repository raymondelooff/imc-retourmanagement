@extends('layouts.master')
@section('title', 'Maak nieuwe Product Categorie')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('productcategory/') }}">
            <i class="fa fa-chevron-left "></i><span class="hidden-xs hidden-sm">Terug naar het overzicht</span>
        </a>
    </li>
@stop

@section('content')

    {!! Form::open(['url' => 'productcategory', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
                {!! Form::label('category', 'Categorie: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('category', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('productstatus') ? 'has-error' : ''}}">
                {!! Form::label('productstatus', 'Productstatus: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('productstatus', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('productstatus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('productorigin') ? 'has-error' : ''}}">
                {!! Form::label('productorigin', 'Herkomst van product: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('productorigin', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('productorigin', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Maak', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection