@extends('layouts.app')

@section('show-penguins', 'show-penguins')

@section('content')
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
                <div class="heading__block heading__block-smaller">
                    <h4 class="heading__left">Welcome {{ auth()->user()->name }}</h4>
                </div>
            </div>
            <div class="col-md-12">

            </div>
        </div>

        @foreach($doctors as $doctor)
            <div class="row table__row">
                <div class="col-md-9">
                    <a class="confirm-delete" href="#" data-item="{{ $doctor->name }}" data-form-id="{{ hash('md5', $doctor->id) }}">
                        <img src="{{ asset('img/sign.svg') }}" alt="Delete">
                    </a>
                    <form style="display: inline" id="{{ hash('md5', $doctor->id) }}" action="{{ route('manager.doctor.delete', ['doctor' => $doctor->slug]) }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                    </form>

                    <a href="{{ route('manager.doctor.show', ['doctor' => $doctor->slug]) }}">
                        <p class="blue__paragraph">{{ $doctor->name }}</p>
                    </a>
                </div>
                <div class="col-md-3">
                    <span>Enquêtes afgerond: {{ $doctor->patients()->count() }}/10</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
