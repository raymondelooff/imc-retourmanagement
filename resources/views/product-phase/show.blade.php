@extends('layouts.master')
@section('back', url('product-phase'))
@section('title', 'Details productfase')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <h2>{{ $productphase->name }}</h2>
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
                            <td>{{ $productphase->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection