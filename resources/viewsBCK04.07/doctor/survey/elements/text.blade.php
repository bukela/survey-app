<div class="input__block">
    <div class="form-group text-wrapper label__up">
        <label for="question_{{ $question->id }}">{{ $question->text }}</label>
        <input type="text" class=" input" id="question_{{ $question->id }}" name="question_{{ $question->id }}"{{ $question->required ? ' required' : '' }}>
        <p class="text-danger">{{ $errors->first('number') }}</p>
    </div>
</div>
