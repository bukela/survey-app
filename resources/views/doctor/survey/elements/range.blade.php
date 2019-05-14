<p>{{ $question->text }}</p>

@php $options = json_decode($question->options); @endphp
<!--<div>-->
<!--
    <label>{{ $options->min }}{{ $options->percent ? '%' : '' }}</label>
    //<input type="range" min="{{ $options->min }}" max="{{ $options->max }}" name="question_{{ $question->id }}">
    <label>{{ $options->max }}{{ $options->percent ? '%' : '' }}</label>
-->
<div class="range">
    <label class="value_input">{{ $options->min }}{{ $options->percent ? '%' : '' }}</label>
    <label class="label-right">{{ $options->max }}{{ $options->percent ? '%' : '' }}</label>
    <div class="range_slider_block">
        <input value="0" name="question_{{ $question->id }}" type="range" min="{{ $options->min }}" max="{{ $options->max }}" class="range_slider">
        <div class="rangeslider-fill-lower" style="width: 126.999px;"></div>
    </div>
</div>