@extends('layouts.master')
@section('title', 'Product')

@section('content')

    {!! Form::open(['url' => 'product', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('short_description') ? 'has-error' : ''}}">
                {!! Form::label('short_description', 'Short Description: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ean_code') ? 'has-error' : ''}}">
                {!! Form::label('ean_code', 'Ean Code: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('ean_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ean_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('serial_number') ? 'has-error' : ''}}">
                {!! Form::label('serial_number', 'Serial Number: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('serial_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('invoice_number') ? 'has-error' : ''}}">
                {!! Form::label('invoice_number', 'Invoice Number: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('invoice_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('invoice_number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
                {!! Form::label('weight', 'Weight: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('country_code') ? 'has-error' : ''}}">
                {!! Form::label('country_code', 'Country Code: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('country_code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('country_code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                {!! Form::label('location', 'Location: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('supplier') ? 'has-error' : ''}}">
                {!! Form::label('supplier', 'Supplier: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('supplier', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('supplier', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('quality_label') ? 'has-error' : ''}}">
                {!! Form::label('quality_label', 'Quality Label: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('quality_label', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('quality_label', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('tax_group') ? 'has-error' : ''}}">
                {!! Form::label('tax_group', 'Tax Group: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('tax_group', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('tax_group', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('problem_description') ? 'has-error' : ''}}">
                {!! Form::label('problem_description', 'Problem Description: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('problem_description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('problem_description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
                {!! Form::label('color', 'Color: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('color', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('msrp') ? 'has-error' : ''}}">
                {!! Form::label('msrp', 'Msrp: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('msrp', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('msrp', '<p class="help-block">:message</p>') !!}
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