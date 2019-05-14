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
                <form action="<?php echo e(route('doctor.survey.store')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="doctor_id" value="<?php echo e($doctor->id); ?>">
                    <input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
                    <input type="hidden" name="survey_id" value="<?php echo e($survey); ?>">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($question->id == 11 || $question->id == 12): ?>
                            <div class="hidden__question__<?php echo e($question->id); ?>" style="display: none">
                        <?php endif; ?>

                        <?php if($question->id == 23): ?>
                            <div class="hidden__question__title" style="display: none">
                        <?php endif; ?>

                        <?php if($question->id == 27): ?>
                            <div class="hidden__question__convatec" style="display: none">
                        <?php endif; ?>

                        <?php if($question->id == 24 || $question->id == 24 || $question->id == 25 || $question->id == 26): ?>
                            <div class="hidden__question__aquacel" style="display: none">
                        <?php endif; ?>

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

                        <?php if($question->id == 11 || $question->id == 12): ?>
                            </div>
                        <?php endif; ?>

                        <?php if($question->id == 24 || $question->id == 25 || $question->id == 26): ?>
                            </div>
                        <?php endif; ?>

                        <?php if($question->id == 27): ?>
                            </div>
                        <?php endif; ?>

                                <?php if($question->id == 23): ?>
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