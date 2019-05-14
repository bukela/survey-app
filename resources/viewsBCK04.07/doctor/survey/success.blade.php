@extends('layouts.app')

@section('show-penguins', 'show-penguins')

@section('content')

@section('content')
    <div class="top__buttons">
        <div class="button-left">
            <a href="{{ route('doctor.home') }}" class="button button__purple button-left"><span>&lt; terug</span></a>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="heading__block">
                    <h1>Enquête {{ $survey }}</h1>
                    <h5>(alle data wordt anoniem opgeslagen)</h5>
                </div>
            </div>
            <div class="col-md-12 text-center big__block">
                @if ($survey == 1)
                    <p>U heeft de eerste enquete succesvol ingevuld.</p>
                @else
                    <p>U heeft de tweede enquete succesvol ingevuld.</p>
                @endif
            </div>
            <a href="{{route('doctor.home')}}"
               class="button button__green"><span>terug naar de lijst van patiënten</span></a>
        </div>
    </div>

@endsection

@endsection
