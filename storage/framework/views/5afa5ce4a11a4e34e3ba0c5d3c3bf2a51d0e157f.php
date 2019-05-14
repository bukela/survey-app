<?php $__env->startSection('show-penguins', 'show-penguins'); ?>

<?php $__env->startSection('content'); ?>
    <div class="top__buttons">
        <div class="button-left">
            <a href="<?php echo e(route('doctor.home')); ?>" class="button button__purple button-left"><span>&lt; terug</span></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('doctor.survey.store.final')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="doctor_id" value="<?php echo e($doctor->id); ?>">
                    <input type="hidden" name="survey_id" value="3">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($question->id == 6): ?>
                            <div class="inline-question">
                        <?php endif; ?>

                        <?php echo $__env->make('doctor.survey.elements.' . $question->type, compact('question'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php if($question->other): ?>
                            <?php echo $__env->make('doctor.survey.elements.other', compact('question'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>

                        <?php if($question->id == 7): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <button class="button button__purple" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>