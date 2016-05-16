@extends('layouts.master')
@section('title', 'Product Categorieën')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('productcategory/create') }}">
            <i class="fa fa-plus"></i> Maak nieuwe Product Categorie
        </a>
    </li>
@stop

@section('content')

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Categorie</th><th>Productstatus</th><th>Herkomst van product</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($productcategory as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        {{ $x }}
                    </td>
                    <td><a href="{{ url('productcategory', $item->id) }}">{{ $item->category }}</a></td><td>{{ $item->productstatus }}</td><td>{{ $item->productorigin }}</td>
                    <td>
                        <a href="{{ url('productcategory/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['productcategory', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i> Verwijder', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $productcategory->render() !!} </div>
    </div>

@endsection
