@extends('layouts.app')

@section('show-penguins', 'show-penguins')

@section('content')
    <div class="top__buttons">
        <div class="button-left">
            <a onclick="window.history.back(); return false;" href="{{ route('admin.manager.show', ['manager' => $doctor->manager]) }}" class="button button__purple  button-left"><span>&lt; terug</span></a>
        </div>
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
                <h1 class="heading__left">{{ $doctor->name }}</h1>
            </div>
            <div class="heading__block heading__block-smaller col-md-7">
                <h4 class="heading__left">Voortgang</h4>
                <div class="trophy__block">
                    <span>afgerond {{ getDoctorsFinishedSurveys($doctor) }}/10</span>
                    <img src="{{ asset('img/trophy.svg') }}" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-6 enquete__heading">
                    <h4>Enquête 1</h4>
                </div>
                <div class="col-md-6 enquete__heading">
                    <h4>Enquête 2 <span>(na 21 dagen)</span></h4>
                </div>
            </div>
        </div>

        @foreach($doctor->patients as $key => $patient)
            <div class="row table__row">
                <div class="col-md-7">
                    @if(surveys_for_delete($patient->id))
                        <p class="gray__paragraph">Patiënt {{ ++$key }}</p>
                    @else
                        <p class="green__paragraph">Patiënt {{ ++$key }}</p>
                    @endif
                </div>
                <div class="col-md-5">
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        @if ($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 1, 'doctor_id' => $doctor->id, 'patient_id' => $patient->id])->first())
                            <img src="{{ asset('img/correct.svg') }}" alt="">
                            <p>afgerond op: {{ $survey1->created_at->format('d-m-Y') }}</p>
                        @else
                            <img src="{{ asset('img/stack.svg') }}" alt="">
                        @endif
                    </div>
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        @if ($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 2, 'doctor_id' => $doctor->id, 'patient_id' => $patient->id])->first())
                            <img src="{{ asset('img/correct.svg') }}" alt="">
                            <p>afgerond op: {{ $survey1->created_at->format('d-m-Y') }}</p>
                        @else
                            <img src="{{ asset('img/stack.svg') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
