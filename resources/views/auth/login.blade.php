@extends('layouts.app')

@section('content')
    <div class="top__buttons">
        <div class="button-right">
            <a style="visibility: hidden;" href="{{ route('login') }}" class="button button__purple"><span>Inloggen</span></a>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading__block">
                <h1>Inloggen</h1>
            </div>
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="email" class="input" type="text" placeholder="E-mail" id="email" required/>
                        <label for="email">E-mail</label>

                    </div>
                    <p class="error__msg">Vul uw email adres in</p>
                    <p class="error__msg1">Voer een geldig email adres in</p>
                </div>
                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="password" class="input" type="password" placeholder="Wachtwoord" id="wachtwoord-login" required/>
                        <label for="wachtwoord">Wachtwoord</label>
                        <span>
                                    <a href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
                                </span>
                    </div>
                    <p class="error__msg">Vul uw wachtwoord in</p>
                </div>
                <div class="inloggen">
                    <button type="submit" class="button button__purple login"><span>Inloggen</span></button>
                </div>
            </form>
            <h4 class="centered">Heeft u nog geen account? <a href="{{ route('register') }}">Registreren</a></h4>
        </div>
    </div>
</div>
@endsection
