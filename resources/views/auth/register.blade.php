@extends('base')
@section('title', 'Registreren')

@section('content')
    @if (count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <form method="post" action="{{ action('Auth\AuthController@getRegister') }}" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name" class="col-sm-4">Naam</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-4">E-mailadres</label>
                    <div class="col-sm-8">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-4">Wachtwoord</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-4">Wachtwoord herhalen</label>
                    <div class="col-sm-8">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Registreren</button>
                    </div>
                </div>
            </form>

            <p>Heeft u al een account? <a href="{{ url('/inloggen') }}">Log in.</a></p>
        </div>
    </div>
@endsection