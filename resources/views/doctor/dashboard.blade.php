@extends('layouts.app')

@section('show-penguins', 'show-penguins')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading__block big__heading">
                    <h1 class="heading__left">Welkom {{ auth()->user()->name }}</h1>
                </div>
            </div>
            <div class="heading__block heading__block-smaller col-md-7">
                <h4 class="heading__left">Uw enquêtes</h4>
                <div class="trophy__block">
                    <span>afgerond {{ getDoctorsFinishedSurveys(auth()->user()) }}/10</span>
                    <img src="img/trophy.svg" alt="">
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
            <div class="col-md-12">

            </div>
        </div>

        @foreach($patients as $patient)
            <div class="row table__row">
                <div class="col-md-7">
                    <a class="confirm-delete" href="#" data-item="{{ $patient->name }}" data-form-id="{{ hash('md5', $patient->id) }}">
                        <img src="{{ asset('img/sign.svg') }}" alt="Delete">
                    </a>
                    <form style="display: inline" id="{{ hash('md5', $patient->id) }}" action="{{ route('doctor.patient.delete', ['id' => $patient->id]) }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                    </form>
                    <p class="purple__paragraph">{{ $patient->number }} {{ $patient->name }} <small>(voor eigen gebruik)</small></p>
                </div>
                <div class="col-md-5">
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        @if ($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 1, 'patient_id' => $patient->id])->first())
                        {{-- @if ($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 1, 'doctor_id' => auth()->user()->id, 'patient_id' => $patient->id])->first()) --}}
                            <img src="{{ asset('img/correct.svg') }}" alt="">
                            <p>afgerond op: {{ $survey1->created_at->format('d-m-Y') }}</p>
                        @else
                            <a href="{{ route('doctor.survey.create', [
                                'doctor' => auth()->user()->slug,
                                'patient' => $patient->id,
                                'survey' => 1,
                            ]) }}">
                                <img src="{{ asset('img/stack.svg') }}" alt="">
                            </a>
                        @endif
                    </div>

                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        @if ($survey2 = \App\SurveyDoctorPatient::where(['survey_id' => 2, 'patient_id' => $patient->id])->first())
                        {{-- @if ($survey2 = \App\SurveyDoctorPatient::where(['survey_id' => 2, 'doctor_id' => auth()->user()->id, 'patient_id' => $patient->id])->first()) --}}
                            <img src="{{ asset('img/correct.svg') }}" alt="">
                            <p>afgerond op: {{ $survey2->created_at->format('d-m-Y') }}</p>
                        @else
                            <a href="{{ route('doctor.survey.create', [
                                'doctor' => auth()->user()->slug,
                                'patient' => $patient->id,
                                'survey' => 2,
                            ]) }}">
                                <img src="{{ asset('img/stack.svg') }}" alt="">
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach

        @if ($patients->count() < 10)
            <div class="row table__row">
                <div class="col-md-7">
                    <a href="{{ route('doctor.patient.create') }}">
                        <img src="img/sign_plus.svg" alt="">
                    </a>
                    <p class="gray__paragraph">[Patiëntnummer] [Naam] <small>(voor eigen gebruik)</small></p>
                </div>
                <div class="col-md-5">
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <img src="img/stack.svg" alt="">
                    </div>
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <img src="img/stack.svg" alt="">
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
