@extends('layouts.app') @section('content')
<div class="top__buttons">
    <div class="button-left">
        <a href="{{ route('login') }}" class="button button__purple  button-left"><span>&lt; terug</span></a>
    </div>
    <div class="button-right">
        <a href="{{ route('register') }}" class="button button__purple"><span>Registreren</span></a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading__block">
                <h1>Verzend Wachtwoord Reset Link</h1>

            </div>
            <form action="{{ route('password.email') }}" method="post">
                {{ csrf_field() }}
                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="email" class="input" type="text" placeholder="E-mail" id="email" required/>
                        <label for="email">E-mail</label>
                    </div>
                    <p class="error__msg">Vul uw email adres in</p>
                    <p class="error__msg1">Voer een geldig email adres in</p>
                </div>
                <div class="inloggen">
                    <button type="submit" class="button button__purple reset"><span>Verzend Wachtwoord Reset Link</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
