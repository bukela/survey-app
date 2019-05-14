<?php if($question->id == 29): ?>
<div class="cntr checkbox">
<?php else: ?>
<div class="radio">
<?php endif; ?>
    
    <?php if($question->id == 29): ?>
        <input value="<?php echo e($question->other_label ?: 'Anders'); ?>:" class="hidden-xs-up" id="question_<?php echo e($question->id); ?>" type="checkbox" onchange="$('#other-<?php echo e($question->id); ?>').toggle();" name="question_<?php echo e($question->id); ?>_other">
        <label class="cbx" for="question_<?php echo e($question->id); ?>"></label><label class="lbl" for="question_<?php echo e($question->id); ?>">
            <?php echo e($question->other_label ?: 'Anders'); ?>

        </label>
    <?php else: ?>
        <input value="<?php echo e($question->other_label ?: 'Anders'); ?>" class="hidden-xs-up" id="question_<?php echo e($question->id); ?>" type="radio" onclick="$('#other-<?php echo e($question->id); ?>').show();" name="question_<?php echo e($question->id); ?>">
        <label class="radio-label" for="question_<?php echo e($question->id); ?>"></label><label class="lbl" for="question_<?php echo e($question->id); ?>">
            <?php echo e($question->other_label ?: 'Anders'); ?>

        </label>
    <?php endif; ?>
</div>
<div class="input__block textarea" style="display: none" id="other-<?php echo e($question->id); ?>">
    <div class="form-group text-wrapper label__up">
        <textarea type="text" class=" input" id="question_<?php echo e($question->id); ?>" name="question_<?php echo e($question->id); ?>_other"></textarea>
        <p class="text-danger"><?php echo e($errors->first('number')); ?></p>
    </div>
</div>
