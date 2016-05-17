@extends('layouts.master')
@section('back', route('productphase.show', $productphase->id))
@section('title', 'Productfase wijzigen')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            {!! Form::model($productphase, [
                'method' => 'PATCH',
                'url' => ['productphase', $productphase->id],
                'class' => 'form-horizontal'
            ]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Naam', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    {!! Form::button('Productfase wijzigen', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    <a href="{{ route('productphase.show', $productphase->id) }}" class="btn btn-danger">Annuleren</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection