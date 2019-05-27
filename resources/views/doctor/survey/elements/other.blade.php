@if ($question->id == 29 || $question->id == 48 || $question->id == 3 || $question->id == 49 || $question->id == 2)
<div class="cntr checkbox">
@else
<div class="radio">
@endif
    {{--<input class="hidden-xs-up" id="question_{{ $question->id }}" type="radio" onclick="$('#other-{{ $question->id }}').show();" name="question_{{ $question->id }}">--}}
    @if ($question->id == 29 || $question->id == 48 || $question->id == 3 || $question->id == 49 )
        <input value="{{ $question->other_label ?: 'Anders:' }}:" class="hidden-xs-up" id="question_{{ $question->id }}" type="checkbox" onchange="$('#other-{{ $question->id }}').toggle();" name="question_{{ $question->id }}_other">
        <label class="cbx" for="question_{{ $question->id }}"></label><label class="lbl" for="question_{{ $question->id }}">
            {{ $question->other_label ?: 'Anders:' }}
        </label>
    @elseif ($question->id == 2)
        <input value="{{ $question->other_label ?: 'Overig:' }}:" class="hidden-xs-up" id="question_{{ $question->id }}" type="checkbox" onchange="$('#other-{{ $question->id }}').toggle();" name="question_{{ $question->id }}_other">
        <label class="cbx" for="question_{{ $question->id }}"></label><label class="lbl custom-anders" for="question_{{ $question->id }}">
            {{ $question->other_label ?: 'Overig:' }}
        </label>
    @else
        <input value="{{ $question->other_label ?: 'Anders:' }}" class="hidden-xs-up" id="question_{{ $question->id }}" type="radio" onclick="$('#other-{{ $question->id }}').show();" name="question_{{ $question->id }}">
        <label class="radio-label" for="question_{{ $question->id }}"></label><label class="lbl" for="question_{{ $question->id }}">
            {{ $question->other_label ?: 'Anders:' }}
        </label>
    @endif
</div>
<div class="input__block textarea" style="display: none" id="other-{{ $question->id }}">
    <div class="form-group text-wrapper label__up">
        <textarea type="text" class=" input" id="question_{{ $question->id }}" name="question_{{ $question->id }}_other"></textarea>
        <p class="text-danger">{{ $errors->first('number') }}</p>
    </div>
</div>
