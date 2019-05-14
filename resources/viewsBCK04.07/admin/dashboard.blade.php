@extends('layouts.app') @section('show-penguins', 'show-penguins') @section('content')
<div class="top__buttons">
    <div class="button-right">
        <div class="dropdown">
            <div class="dropdown">
                <a href="#" class="button button__green" id="dropdown" data-toggle="dropdown"><span>Exporteer resultaten als .csv</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('export.csv', ['survey_id' => 1]) }}">Survey 1</a></li>
                    <li><a href="{{ route('export.csv', ['survey_id' => 2]) }}">Survey 2</a></li>
                    <li><a href="{{ route('export.csv', ['survey_id' => 3]) }}">Survey 3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading__block">
                <h1 class="heading__left">Welkom {{ auth()->user()->name }}</h1>
            </div>
            <div class="heading__block heading__block-smaller">
                <h4 class="heading__left">Rayon Managers:</h4>
            </div>
        </div>
    </div>

    @foreach($managers as $manager)
    <div class="row table__row">
        <div class="col-md-9">
            <a class="confirm-delete" href="#" data-item="{{ $manager->name }}" data-form-id="{{ hash('md5', $manager->id) }}">
                <img src="{{ asset('img/sign.svg') }}" alt="">
            </a>

            <form style="display: inline" id="{{ hash('md5', $manager->id) }}" action="{{ route('admin.manager.delete', ['manager' => $manager->slug]) }}" method="post">
                {{ method_field('delete') }} {{ csrf_field() }}
            </form>

            <a href="{{ route('admin.manager.show', ['manager' => $manager->slug]) }}">
                <p class="blue__paragraph">{{ $manager->name }}</p>
            </a>
        </div>
        <div class="col-md-3">
            <span>
                <div class="dropdown__export">
                    <a href="#" onclick="return false;">&downarrow; CSV</a>
                    <div class="dropdown-content">
                        <a style="margin-top: 15px" href="{{ route('export.csv', ['survey_id' => 1, 'role' => 'manager', 'id' => $manager->id]) }}">Survey 1</a><br>
                        <a style="margin-top: 15px" href="{{ route('export.csv', ['survey_id' => 2, 'role' => 'manager', 'id' => $manager->id]) }}">Survey 2</a><br>
                        <a style="margin-top: 15px" href="{{ route('export.csv', ['survey_id' => 3, 'role' => 'manager', 'id' => $manager->id]) }}">Survey 3</a>
                    </div>
                </div>
                @php
                    $finishedSurveys = 0;
                    if ($manager->doctors()->count() >= 10) {
                        foreach ($manager->doctors as $doctor) {
                            $done = \App\SurveyDoctorPatient::where('doctor_id', $doctor->id)->count();
                            if ($done >= 20) {
                                $finishedSurveys++;
                            }
                        }
                    }
                @endphp
                Enquêtes afgerond: {{ $finishedSurveys }}/10
            </span>
        </div>
    </div>
    @endforeach @if ($managers->count() < 11) 
       <div class="row table__row">
            <div class="col-md-9">
                <a href="{{ route('admin.manager.create') }}">
                    <img src="{{ asset('img/sign_plus.svg') }}" alt="">
                </a>
                <p class="gray__paragraph">Maak nieuwe regio manager</p>
            </div>
        </div>
@endif
</div>
@endsection
