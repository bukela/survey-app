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
                <div class="sorting row">
                    <div class="col-md-8 go-to-desc">
                        <p>
                            Sorteren op naam: <a href="/manager/desc"><button class="sorter-button" style="line-height: 23px;color: #424040"><i class="fas fa-sort-alpha-down"></i></button></a>
                        </p>         
                    </div>
                    <div class="col-md-8 go-to-asc" style="display:none">
                        <p>
                            Sorteren op naam: <a href="/manager"><button class="sorter-button" style="line-height: 23px;color: #424040"><i class="fas fa-sort-alpha-up"></i></button></a>
                        </p>         
                    </div>
                    <div class="col-md-4 text-center">
                        <span>Sorteren op voltooid:
                            <button class="sorter-button" id="toggle-click"><i class="fas fa-sort-amount-down"></i></button>
                            {{--  <button id="numDesc"><i class="fas fa-sort-amount-up"></i></button>  --}}
                        </span>
                    </div>
            
            </div>
        </div>
        <div class="main-div">
        @foreach($doctors as $doctor)
            <div class="row table__row doctor-div">
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
                    Enquêtes afgerond: <span class="finished">{{ getDoctorsFinishedSurveys($doctor) }}/10</span>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
@section('script')
<script>
jQuery(document).ready(function($){

    if(window.location.pathname === "/manager/desc"){
        $('.go-to-asc').css('display','block');
        $('.go-to-desc').css('display','none');
    }
    if(window.location.pathname === "/manager"){
        $('.go-to-desc').css('display','block');
        $('.go-to-asc').css('display','none');
    }
});

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

    return keyA < keyB ? 1 : -1; }); numericallyOrderedDivs.each(function(index, value) { $(".main-div").append(value); });
        } }); });
</script>


@endsection