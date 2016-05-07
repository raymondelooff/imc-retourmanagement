@extends('layouts.master')
@section('title', 'Gebruiker details')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ url('user') }}">
            <i class="fa fa-chevron-left "></i><span class="hidden-xs hidden-sm">Terug naar het overicht</span>
        </a>
    </li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th colspan="2">Gegevens</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Naam</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>E-mailadres</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Geregistreerd op</td>
                        <td>{{ $user->created_at->format('d-m-Y \o\m H:i') }}</td>
                    </tr>
                    <tr>
                        <td>Geregistreerd als</td>
                        <td>{{ $user->role ? $user->role : 'Normale gebruiker' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <a href="{{ url('user/' . $user->id . '/edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Bewerk</a>
        </div>
    </div>
@endsection