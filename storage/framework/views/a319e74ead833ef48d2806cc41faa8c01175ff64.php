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
                        <h1>Enquête 1</h1>
                        <h5>(alle data wordt anoniem opgeslagen)</h5>
                    </div>
                </div>
                <div class="col-md-12 text-center big__block">
                    <p>10 dagen na de eerste enquête krijgt u een e-mail herinnering om de tweede enquête in te vullen.</p>
                </div>
                <a href="<?php echo e(route('doctor.survey.create', [
                                'doctor' => $doctor,
                                'patient' => $patient,
                                'survey' => $survey,
                            ])); ?>" class="button button__green"><span>Opslaan</span></a>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>