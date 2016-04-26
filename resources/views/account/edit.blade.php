@extends('layouts.master')
@section('title', 'Account wijzigen')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6">
            <p>Hier kunt u de algemene gegevens van uw account wijzigen.</p>

            <form method="post" action="{{ action('Account\AccountController@update') }}" class="form-horizontal">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Naam</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $user->name }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <a href="{{ route('account.index') }}" class="btn btn-danger">Annuleren</a>
                        <button type="submit" class="btn btn-primary">Account wijzigen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection