<div class="input__block textarea">
    <div class="form-group text-wrapper label__up">
        <label for="question_<?php echo e($question->id); ?>"><?php echo e($question->text); ?></label>
        <textarea type="text" class=" input" id="question_<?php echo e($question->id); ?>" name="question_<?php echo e($question->id); ?>"></textarea>
        <p class="text-danger"><?php echo e($errors->first('number')); ?></p>
    </div>
</div>