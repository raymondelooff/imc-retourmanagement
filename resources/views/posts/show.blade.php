@extends('layouts.master')
@section('title', 'Post')

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
                    <td>{{ $post->id }}</td>
                    <td> {{ $post->name }} </td><td> {{ $post->description }} </td><td> {{ $post->short_description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection