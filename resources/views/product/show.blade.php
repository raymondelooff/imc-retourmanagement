@extends('layouts.master')
@section('title', 'Product')

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nr.</th>
                    <th>Name</th><th>Description</th><th>Short Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $product->id }}</td>
                    <td> {{ $product->name }} </td><td> {{ $product->description }} </td><td> {{ $product->short_description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection