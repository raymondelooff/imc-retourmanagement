@extends('layouts.master')
@section('title', 'Productcategorie')

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Categorie</th>
                    <th>Productstatus</th>
                    <th>Herkomst van product</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $productcategory->id }}</td>
                    <td>{{ $productcategory->category }}</td>
                    <td>{{ $productcategory->productstatus }}</td>
                    <td>{{ $productcategory->productorigin }}</td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection