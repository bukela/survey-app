<p><?php echo e($question->text); ?></p>

<?php  $options = json_decode($question->options);  ?>
<!--<div>-->
<!--
    <label><?php echo e($options->min); ?><?php echo e($options->percent ? '%' : ''); ?></label>
    //<input type="range" min="<?php echo e($options->min); ?>" max="<?php echo e($options->max); ?>" name="question_<?php echo e($question->id); ?>">
    <label><?php echo e($options->max); ?><?php echo e($options->percent ? '%' : ''); ?></label>
-->
<div class="range">
    <label class="value_input"><?php echo e($options->min); ?><?php echo e($options->percent ? '%' : ''); ?></label>
    <label class="label-right"><?php echo e($options->max); ?><?php echo e($options->percent ? '%' : ''); ?></label>
    <div class="range_slider_block">
        <input value="0" name="question_<?php echo e($question->id); ?>" type="range" min="<?php echo e($options->min); ?>" max="<?php echo e($options->max); ?>" class="range_slider">
        <div class="rangeslider-fill-lower" style="width: 126.999px;"></div>
    </div>
</div>