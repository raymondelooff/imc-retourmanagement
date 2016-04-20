@extends('layouts.master')
@section('title', 'Retailer')

@section('content')

    <h1>Retailer</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th> <th>Naam</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $retailer->id }}</td> <td> {{ $retailer->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection