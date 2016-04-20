@extends('layouts.master')
@section('title', 'Retailer')

@section('content')

    <h1>Retailer <a href="{{ url('retailer/create') }}" class="btn btn-primary pull-right btn-sm">Maak nieuwe retailer</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th><th>Naam</th><th>Acties</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($retailer as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('retailer', $item->id) }}">{{ $item->name }}</a></td>
                    <td>
                        <a href="{{ url('retailer/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Bewerk</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['retailer', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Verwijder', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $retailer->render() !!} </div>
    </div>

@endsection
