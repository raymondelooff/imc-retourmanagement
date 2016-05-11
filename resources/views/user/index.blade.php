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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="{{ url('user', $user->id) }}">{{ $user->name }}</a></td><td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('user/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</a>

                        {!! Form::open([
                            'method'=>'PATCH',
                            'url' => ['user', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            @if ($user->activated)
                                {!! Form::button('Deactiveren', ['type' => 'submit', 'class' => 'btn btn-warning btn-xs']) !!}
                            @else
                                {!! Form::button('Activeren', ['type' => 'submit', 'class' => 'btn btn-success btn-xs']) !!}
                            @endif
                        {!! Form::close() !!}

                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['user', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i> Verwijder', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="pagination-wrapper">{!! $users->render() !!}</div>
    </div>

@endsection
