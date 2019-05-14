@extends('layouts.app')

@section('content')
    <div class="top__buttons">
        <div class="button-left">
            <a href="{{ route('home') }}" class="button button__purple button-left"><span>&lt; terug</span></a>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 page_404">
                <h1>403</h1>
                <h5>Er ging iets fout, log uit en vervolgens opnieuw in om door te gaan.</h5>
                <p></p>
            </div>
        </div>
    </div>
@endsection
