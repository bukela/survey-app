<div class="input__block textarea">
    <div class="form-group text-wrapper label__up">
        <label for="question_{{ $question->id }}">{{ $question->text }}</label>
        <textarea type="text" class=" input" id="question_{{ $question->id }}" name="question_{{ $question->id }}"></textarea>
        <p class="text-danger">{{ $errors->first('number') }}</p>
    </div>
</div>