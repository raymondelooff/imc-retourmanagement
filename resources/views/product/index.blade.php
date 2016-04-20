@extends('layouts.master')
@section('title', 'Product')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('product/create') }}">
            <i class="fa fa-plus"></i> Maak nieuw Product
        </a>
    </li>
@stop

@section('content')

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Name</th><th>Description</th><th>Short Description</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($product as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        {{ $x }}
                    </td>
                    <td><a href="{{ url('product', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->description }}</td><td>{{ $item->short_description }}</td>
                    <td>
                        <a href="{{ url('product/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['product', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Verwijder', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $product->render() !!} </div>
    </div>

@endsection
