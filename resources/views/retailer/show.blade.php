@extends('layouts.master')
@section('back', url('retailer'))
@section('title', 'Details retailer')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h2>{{ $retailer->name }}</h2>
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
                        <td>{{ $retailer->name }}</td>
                    </tr>
                    <tr>
                        <td>Geregistreerd op</td>
                        <td>{{ $retailer->created_at ? $retailer->created_at->format('d-m-Y \o\m H:i') : 'Onbekend' }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h2>Gekoppelde gebruikers</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th colspan="2">Informatie</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--<tr>--}}
                        {{--<td>Retailer</td>--}}
                        {{--<td>{{ $user->retailer ? $user->retailer : 'Geen retailer' }}</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>Geregistreerd als</td>--}}
                        {{--<td>{{ $user->role ? $user->role : 'Normale gebruiker' }}</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
            </div>

            {{--<a href="{{ url('user/' . $user->id . '/edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Bewerk</a>--}}
        </div>
    </div>

@endsection