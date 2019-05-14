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
            <div class="sorting row">
                    <div class="col-md-8">
                    <!-- <p><a href="/admin/managers?{{ $filter ? 'filter=managers&' : '' }}order=name&sort={{ ($order == 'name' && $sort == 'asc') ? 'desc' : 'asc' }}">Sorteren op naam</a>
                        @if ($order == 'name')
                            <i class="fa fa-sort-{{ $sort == 'asc' ? 'up' : 'down' }}"></i>
                        @else
                            <i class="fa fa-sort"></i>
                        @endif
                    </p> -->
                    <p>
                            Sorteren op naam: <a href="/admin/managers?{{ $filter ? 'filter=managers&' : '' }}order=name&sort={{ ($order == 'name' && $sort == 'asc') ? 'desc' : 'asc' }}"><button class="sorter-button" style="line-height: 23px;color: #424040"><i class="fas fa-sort-alpha-{{ $sort == 'desc' ? 'up' : 'down' }}"></i></button></a>
                    </p>
                    </div>
                   <div class="col-md-4">
                    <span class="pull-right" style="margin-right:4%">Sorteren op voltooid:
                        <button class="sorter-button" id="toggle-click"><i class="fas fa-sort-amount-down"></i></button>
                        {{--  <button id="numDesc"><i class="fas fa-sort-amount-up"></i></button>  --}}
                    </span>
                   </div>
            </div>
        </div>
    </div>
    <div class="main-div">
    @foreach($managers as $manager)

    <div class="row table__row doctor-div">
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

                {{-- {{ dd($manager->doctors) }} --}}

                @foreach ($manager->doctors as $doctor)

                {{-- {{ dd($doctor->survey_doctor_patients) }} --}}
                    
                @endforeach
                
                @php
                    $finishedSurveys = 0;
                    $doctorCount = ($manager->doctors()->count() < 10) ? 10 : $manager->doctors()->count();
                    //if ($manager->doctors()->count() >= 10) {
                        foreach ($manager->doctors as $doctor) {
                            $finishedDoctorSurveys = getDoctorsFinishedSurveys($doctor);
                            if ($finishedDoctorSurveys >= 10) {
                                $finishedSurveys++;
                            }
                    //    }
                    }
                @endphp
                Enquêtes afgerond: <span class="finished">{{ $finishedSurveys }}</span>/<span>{{ $doctorCount }}</span>
            </span>
        </div>
    </div>

    @endforeach 
</div>
    @if ($managers->count() < 11)
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
@section('script')
<script>
    jQuery(document).ready(function($){

        $('#toggle-click').on('click',function(){
        if($(this).attr('data-click-state') == 1) {
        $(this).attr('data-click-state', 0)
        var numericallyOrderedDivs = $(".doctor-div").sort(function (a, b) {
            var keyA = parseInt($(a).find(".finished").text(), 10);
            var keyB = parseInt($(b).find(".finished").text(), 10);
            
            return keyA > keyB ? 1 : -1; 
        });
        numericallyOrderedDivs.each(function(index, value) { 
            $(".main-div").append(value);
         });
        } else {
        $(this).attr('data-click-state', 1)
        var numericallyOrderedDivs = $(".doctor-div").sort(function (a, b) {
            var keyA = parseInt($(a).find(".finished").text(), 10);
            var keyB = parseInt($(b).find(".finished").text(), 10);
            
            return keyA < keyB ? 1 : -1; 
        });
        numericallyOrderedDivs.each(function(index, value) { 
            $(".main-div").append(value);
         });
        }
        
        });
        
        });
</script>
@endsection
