<?php $__env->startSection('show-penguins', 'show-penguins'); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>
    <div class="top__buttons">
        <div class="button-left">
            <a href="<?php echo e(route('doctor.home')); ?>" class="button button__purple button-left"><span>&lt; terug</span></a>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="heading__block">
                    <h1>Enquête <?php echo e($survey); ?></h1>
                    <h5>(alle data wordt anoniem opgeslagen)</h5>
                </div>
            </div>
            <div class="col-md-12 text-center big__block">
                <?php if($survey == 1): ?>
                    <p>U heeft de eerste enquete succesvol ingevuld.</p>
                <?php else: ?>
                    <p>U heeft de tweede enquete succesvol ingevuld.</p>
                <?php endif; ?>
            </div>
            <a href="<?php echo e(route('doctor.home')); ?>"
               class="button button__green"><span>terug naar de lijst van patiënten</span></a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>