@extends('layouts.master')
@section('title', 'Productfases')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ route('productphase.create') }}">
            <i class="fa fa-plus"></i> Maak nieuwe productfase
        </a>
    </li>
@stop

@section('content')

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Productfase</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($productphase as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        {{ $x }}
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('productphase.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['productphase', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i> Verwijder', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $productphase->render() !!} </div>
    </div>

@endsection
