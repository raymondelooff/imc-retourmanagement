@extends('layouts.master')
@section('back', url('retailer'))
@section('title', 'Details retailer')

{{-- Header button --}}
@section('header-nav')
    <li>
        <a href="{{ route('retailer.edit', $retailer->id) }}">
            <i class="fa fa-pencil"></i><span class="hidden-xs hidden-sm">Retailer bewerken</span>
        </a>
    </li>
@stop

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
                            <th>Gebruiker</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($retailer->users as $user)
                        <tr>
                            <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-xs">Bekijken</a>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Bewerk</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('retailer.edit', $retailer->id) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Retailer bewerken</a>
        </div>
    </div>

@endsection