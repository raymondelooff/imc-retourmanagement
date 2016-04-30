@extends('layouts.master')
@section('title', 'Gebruikers')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('user/create') }}">
            <i class="fa fa-plus"></i> Maak nieuwe gebruiker
        </a>
    </li>
@stop

@section('content')

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Name</th><th>Email</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $user)
                {{-- */$x++;/* --}}
                <tr>
                    <td>
                        {{ $x }}
                    </td>
                    <td><a href="{{ url('user', $user->id) }}">{{ $user->name }}</a></td><td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('user/' . $user->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['user', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Verwijder', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $users->render() !!} </div>
    </div>

@endsection
