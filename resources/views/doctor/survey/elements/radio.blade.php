<div class="radio__block">
    <p>{{ $question->text }}</p>
    @php $options = json_decode($question->options); @endphp 
    @foreach($options as $key => $option)

        <div class="radio">
            @if ($question->id == 8)
                <input onclick="$('.toggler :input').hide(); $('#question_{{ $question->id }}_toogle_{{$key}}').toggle()" id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}" type="radio" value="{{ $option }}" {{ $question->required ? ' required' : '' }}>
            @elseif($question->id == 9)
                @php
                    if ($option == 'Acute wond')      $onclick = 'onclick="$(\'.hidden__question__11\').show(); $(\'.hidden__question__12\').hide();"';
                    if ($option == 'Chronische wond') $onclick = 'onclick="$(\'.hidden__question__12\').show(); $(\'.hidden__question__11\').hide();"';
                @endphp
                <input {!! $onclick  !!} id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}" type="radio" value="{{ $option }}" {{ $question->required ? ' required' : '' }}>
            @elseif($question->id == 28)
                @php
                    if (str_contains($option, 'Secundair'))      $onclick = 'onclick="$(\'.hidden__question__52\').show()"';
                    if (str_contains($option, 'Primair'))      $onclick = 'onclick="$(\'.hidden__question__52\').hide()"';
                @endphp
                <input {!! $onclick  !!} id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}" type="radio" value="{{ $option }}" {{ $question->required ? ' required' : '' }}>
            @elseif($question->id == 22)
                @php
                    if (str_contains($option, 'AQUACEL'))  $onclick = 'onclick="$(\'.hidden__question__title\').show(); $(\'.hidden__question__aquacel\').show(); $(\'.hidden__question__convatec\').hide();"';
                    if (str_contains($option, 'ConvaTec')) $onclick = 'onclick="$(\'.hidden__question__title\').show(); $(\'.hidden__question__aquacel\').hide();$(\'.hidden__question__convatec\').show();"';
                @endphp
                <input {!! $onclick  !!} id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}" type="radio" value="{{ $option }}" {{ $question->required ? ' required' : '' }}>
            @elseif ($question->id == 30)
                @php
                    $onclick = '';
                    if (str_contains($option, 'Gemakkelijk'))  $onclick = 'onclick="$(\'#question_30_text\').hide()"';
                    if (str_contains($option, 'Redelijk'))     $onclick = 'onclick="$(\'#question_30_text\').show()"';
                    if (str_contains($option, 'Niet'))         $onclick = 'onclick="$(\'#question_30_text\').show()"';
                @endphp
                <input {!! $onclick !!} id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}" type="radio" value="{{ $option }}" {{ $question->required ? ' required' : '' }}>
            @else
                <input onclick="$('#question_{{ $question->id }}').prop('checked', false); $('#other-{{ $question->id }}').hide();" id="question_{{ $question->id }}-{{ $key }}" name="question_{{ $question->id }}" type="radio" value="{{ $option }}" {{ $question->required ? ' required' : '' }}>
            @endif
            <label for="question_{{ $question->id }}-{{ $key }}" class="radio-label">{{ $option }}</label>
        </div>

        @if ($question->id == 8 && $option !== 'Geen')
            <div class="input__block textarea toggler">
                <div class="form-group text-wrapper label__up">
                    <input style="display: none;" type="text" class=" input" id="question_{{ $question->id }}_toogle_{{$key}}" name="question_{{ $question->id }}_other">
                    <p class="text-danger">{{ $errors->first('number') }}</p>
                </div>
            </div>
        @endif
    @endforeach

    @if ($question->id == 30)
        <div class="input__block textarea">
            <div class="form-group text-wrapper label__up">
                <textarea type="text" style="display: none;" class=" input" id="question_{{ $question->id }}_text" name="question_{{ $question->id }}_text"></textarea>
                <p class="text-danger">{{ $errors->first('number') }}</p>
            </div>
        </div>
    @endif
</div>