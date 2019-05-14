<div class="input__block-group" id="toggle__<?php echo e($question->id); ?>">
<?php if($question->id == 23 || $question->id == 24): ?>
    <div class="half-block">
<?php endif; ?>
<p><?php echo e($question->text); ?></p>
<?php  $options = json_decode($question->options);  ?>

<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(is_array($option)): ?>
        <div class="cntr checkbox">
            <input class="hidden-xs-up checkbox__hidden" id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>[]" value="<?php echo e($option[0]); ?>" type="checkbox" /><label class="cbx" for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>"></label><label class="lbl" for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>"><?php echo e($option[0]); ?></label>
        </div>
        <div class="input__block input__hidden">
            <div class="form-group text-wrapper label__up">
                <input type="text" class="input" name="question_<?php echo e($question->id); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="cntr checkbox">
            <?php if($question->id == 29): ?>
                <input class="toggle__29 hidden-xs-up<?php echo e($option == 'Geen' ? ' geen_none' : ''); ?>" id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>[]" value="<?php echo e($option); ?>" type="checkbox" /><label class="cbx" for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>"></label><label class="lbl" for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>"><?php echo e($option); ?></label>
            <?php else: ?>
                <input onclick="$('#question_<?php echo e($question->id); ?>').prop('checked', false); $('#other-<?php echo e($question->id); ?>').hide();" class="hidden-xs-up<?php echo e($option == 'Geen' ? ' geen_none' : ''); ?>" id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>[]" value="<?php echo e($option); ?>" type="checkbox" /><label class="cbx" for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>"></label><label class="lbl" for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>"><?php echo e($option); ?></label>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if($question->id == 23 || $question->id == 24): ?>
    </div>
<?php endif; ?>
</div>