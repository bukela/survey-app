<div class="input__block-group" id="toggle__{{ $question->id }}">
@if ($question->id == 23 || $question->id == 24)
    <div class="half-block">
@endif
<p>{{ $question->text }}</p>
@php $options = json_decode($question->options); @endphp

@foreach($options as $key => $option)
    @if (is_array($option))
        <div class="cntr checkbox">
            <input class="hidden-xs-up checkbox__hidden" id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}[]" value="{{ $option[0] }}" type="checkbox" /><label class="cbx" for="question_{{ $question->id }}-{{ $key }}"></label><label class="lbl" for="question_{{ $question->id }}-{{ $key }}">{{ $option[0] }}</label>
        </div>
        <div class="input__block input__hidden">
            <div class="form-group text-wrapper label__up">
                <input type="text" class="input" name="question_{{ $question->id }}">
            </div>
        </div>
    @else
        <div class="cntr checkbox">
            @if ($question->id == 29)
                <input class="toggle__29 hidden-xs-up{{ $option == 'Geen' ? ' geen_none' : '' }}" id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}[]" value="{{ $option }}" type="checkbox" /><label class="cbx" for="question_{{ $question->id }}-{{ $key }}"></label><label class="lbl" for="question_{{ $question->id }}-{{ $key }}">{{ $option }}</label>
            @else
                <input onclick="$('#question_{{ $question->id }}').prop('checked', false); $('#other-{{ $question->id }}').hide();" class="hidden-xs-up{{ $option == 'Geen' ? ' geen_none' : '' }}" id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}[]" value="{{ $option }}" type="checkbox" /><label class="cbx" for="question_{{ $question->id }}-{{ $key }}"></label><label class="lbl" for="question_{{ $question->id }}-{{ $key }}">{{ $option }}</label>
            @endif
        </div>
    @endif
@endforeach
@if ($question->id == 23 || $question->id == 24)
    </div>
@endif
</div>