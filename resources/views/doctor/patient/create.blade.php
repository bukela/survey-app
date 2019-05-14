@extends('layouts.app') @section('content')
<div class="top__buttons">
    <div class="button-left">
        <a href="{{ route('doctor.home') }}" class="button button__purple button-left"><span>&lt; terug</span></a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading__block">
                <h1>Enquête 1</h1>
                <h5>(alle data wordt anoniem opgeslagen)</h5>
            </div>
            <form action="{{ route('doctor.patient.store') }}" method="post">
                {{ csrf_field() }}

                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="number" class="input" type="text" placeholder="Patiëntnummer" id="patiëntnummer" required value="{{ old('number') }}" />
                        <label for="patiëntnummer">Patiëntnummer</label> @if ($errors->has('number'))
                        <p class="text-danger">{{ $errors->first('number') }}</p>
                        @endif
                    </div>
                    <p class="error__msg">Voer uw patiënt nummer in</p>
                </div>

                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="name" class="input" type="text" placeholder="Naam (Alleen voor u zichtbaar)" id="naam" required value="{{ old('name') }}" />
                        <label for="naam">Naam</label> @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <p class="error__msg">Voer uw volledige naam in</p>
                </div>
                <div class="inloggen">
                    <button type="submit" class="button button__green enquete-start"><span>Start enquête</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
