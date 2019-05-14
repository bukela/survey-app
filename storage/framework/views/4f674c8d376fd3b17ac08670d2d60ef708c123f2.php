<div class="radio__block">
    <p><?php echo e($question->text); ?></p>
    <?php  $options = json_decode($question->options);  ?> 
    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="radio">
            <?php if($question->id == 8): ?>
                <input onclick="$('.toggler :input').hide(); $('#question_<?php echo e($question->id); ?>_toogle_<?php echo e($key); ?>').toggle()" id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>" type="radio" value="<?php echo e($option); ?>" <?php echo e($question->required ? ' required' : ''); ?>>
            <?php elseif($question->id == 9): ?>
                <?php 
                    if ($option == 'Acute wond')      $onclick = 'onclick="$(\'.hidden__question__11\').show(); $(\'.hidden__question__12\').hide();"';
                    if ($option == 'Chronische wond') $onclick = 'onclick="$(\'.hidden__question__12\').show(); $(\'.hidden__question__11\').hide();"';
                 ?>
                <input <?php echo $onclick; ?> id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>" type="radio" value="<?php echo e($option); ?>" <?php echo e($question->required ? ' required' : ''); ?>>
            <?php elseif($question->id == 22): ?>
                <?php 
                    if (str_contains($option, 'AQUACEL'))  $onclick = 'onclick="$(\'.hidden__question__title\').show(); $(\'.hidden__question__aquacel\').show(); $(\'.hidden__question__convatec\').hide();"';
                    if (str_contains($option, 'ConvaTec')) $onclick = 'onclick="$(\'.hidden__question__title\').show(); $(\'.hidden__question__aquacel\').hide();$(\'.hidden__question__convatec\').show();"';
                 ?>
                <input <?php echo $onclick; ?> id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>" type="radio" value="<?php echo e($option); ?>" <?php echo e($question->required ? ' required' : ''); ?>>
            <?php elseif($question->id == 30): ?>
                <?php 
                    $onclick = '';
                    if (str_contains($option, 'Gemakkelijk'))  $onclick = 'onclick="$(\'#question_30_text\').hide()"';
                    if (str_contains($option, 'Redelijk'))     $onclick = 'onclick="$(\'#question_30_text\').show()"';
                    if (str_contains($option, 'Niet'))         $onclick = 'onclick="$(\'#question_30_text\').show()"';
                 ?>
                <input <?php echo $onclick; ?> id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>" type="radio" value="<?php echo e($option); ?>" <?php echo e($question->required ? ' required' : ''); ?>>
            <?php else: ?>
                <input onclick="$('#question_<?php echo e($question->id); ?>').prop('checked', false); $('#other-<?php echo e($question->id); ?>').hide();" id="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>" type="radio" value="<?php echo e($option); ?>" <?php echo e($question->required ? ' required' : ''); ?>>
            <?php endif; ?>
            <label for="question_<?php echo e($question->id); ?>-<?php echo e($key); ?>" class="radio-label"><?php echo e($option); ?></label>
        </div>

        <?php if($question->id == 8 && $option !== 'Geen'): ?>
            <div class="input__block textarea toggler">
                <div class="form-group text-wrapper label__up">
                    <input style="display: none;" type="text" class=" input" id="question_<?php echo e($question->id); ?>_toogle_<?php echo e($key); ?>" name="question_<?php echo e($question->id); ?>_other">
                    <p class="text-danger"><?php echo e($errors->first('number')); ?></p>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($question->id == 30): ?>
        <div class="input__block textarea">
            <div class="form-group text-wrapper label__up">
                <textarea type="text" style="display: none;" class=" input" id="question_<?php echo e($question->id); ?>_text" name="question_<?php echo e($question->id); ?>_text"></textarea>
                <p class="text-danger"><?php echo e($errors->first('number')); ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>