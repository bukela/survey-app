@extends('layouts.app')

@section('show-penguins', 'show-penguins')

@section('content')
    <div class="top__buttons">
        <div class="button-left">
            <a href="{{ route('doctor.home') }}" class="button button__purple button-left"><span>&lt; terug</span></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('doctor.survey.store') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                    <input type="hidden" name="survey_id" value="{{ $survey }}">

                    @foreach($questions as $question)

                        @if ($question->id == 11 || $question->id == 12)
                            <div class="hidden__question__{{ $question->id }}" style="display: none">
                        @endif

                        @if ($question->id == 23)
                            <div class="hidden__question__title" style="display: none">
                        @endif

                        @if ($question->id == 27)
                            <div class="hidden__question__convatec" style="display: none">
                        @endif

                        @if ($question->id == 24 || $question->id == 24 || $question->id == 25 || $question->id == 26)
                            <div class="hidden__question__aquacel" style="display: none">
                        @endif

                        @if ($question->id == 6)
                            <div class="inline-question">
                        @endif

                        @include('doctor.survey.elements.' . $question->type, compact('question'))

                        @if($question->other)
                            @include('doctor.survey.elements.other', compact('question'))
                        @endif

                        @if ($question->id == 7)
                            </div>
                        @endif

                        @if ($question->id == 11 || $question->id == 12)
                            </div>
                        @endif

                        @if ($question->id == 24 || $question->id == 25 || $question->id == 26)
                            </div>
                        @endif

                        @if ($question->id == 27)
                            </div>
                        @endif

                                @if ($question->id == 23)
                            </div>
                        @endif

                    @endforeach
                    <div>
                        <button class="button button__purple" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
