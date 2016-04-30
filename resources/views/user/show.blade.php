@extends('layouts.master')
@section('title', 'Gebruiker details')

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Name</th><th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td> {{ $user->name }} </td><td> {{ $user->email }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection