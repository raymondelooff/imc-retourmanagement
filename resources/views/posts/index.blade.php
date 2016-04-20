@extends('layouts.master')
@section('title', 'Posts')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('posts/create') }}">
            <i class="fa fa-plus"></i> Maak nieuw Post
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
            @foreach($posts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        {{ $x }}
                    </td>
                    <td><a href="{{ url('posts', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->description }}</td><td>{{ $item->short_description }}</td>
                    <td>
                        <a href="{{ url('posts/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['posts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Verwijder', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $posts->render() !!} </div>
    </div>

@endsection
