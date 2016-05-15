@extends('layouts.master')
@section('title', 'Retailers')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('retailer/create') }}">
            <i class="fa fa-plus"></i> Maak nieuwe retailer
        </a>
    </li>
@stop

@section('content')

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            @foreach($retailer as $item)
                <tr>
                    <td><a href="{{ url('retailer', $item->id) }}">{{ $item->name }}</a></td>
                    <td>
                        <a href="{{ route('retailer.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['retailer', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash"></i> Verwijder', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $retailer->render() !!} </div>
    </div>

@endsection