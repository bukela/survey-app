<?php $__env->startSection('show-penguins', 'show-penguins'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading__block big__heading">
                    <h1 class="heading__left">Welkom <?php echo e(auth()->user()->name); ?></h1>
                </div>
            </div>
            <div class="heading__block heading__block-smaller col-md-7">
                <h4 class="heading__left">Uw enquêtes</h4>
                <div class="trophy__block">
                    <span>afgerond <?php echo e(getDoctorsFinishedSurveys(auth()->user())); ?>/10</span>
                    <img src="img/trophy.svg" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-6 enquete__heading">
                    <h4>Enquête 1</h4>
                </div>
                <div class="col-md-6 enquete__heading">
                    <h4>Enquête 2 <span>(na 10 dagen)</span></h4>
                </div>
            </div>
            <div class="col-md-12">

            </div>
        </div>

        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row table__row">
                <div class="col-md-7">
                    <a class="confirm-delete" href="#" data-item="<?php echo e($patient->name); ?>" data-form-id="<?php echo e(hash('md5', $patient->id)); ?>">
                        <img src="<?php echo e(asset('img/sign.svg')); ?>" alt="Delete">
                    </a>
                    <form style="display: inline" id="<?php echo e(hash('md5', $patient->id)); ?>" action="<?php echo e(route('doctor.patient.delete', ['id' => $patient->id])); ?>" method="post">
                        <?php echo e(method_field('delete')); ?>

                        <?php echo e(csrf_field()); ?>

                    </form>
                    <p class="purple__paragraph"><?php echo e($patient->number); ?> <?php echo e($patient->name); ?> <small>(voor eigen gebruik)</small></p>
                </div>
                <div class="col-md-5">
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <?php if($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 1, 'doctor_id' => auth()->user()->id, 'patient_id' => $patient->id])->first()): ?>
                            <img src="<?php echo e(asset('img/correct.svg')); ?>" alt="">
                            <p>afgerond op: <?php echo e($survey1->created_at->format('d-m-Y')); ?></p>
                        <?php else: ?>
                            <a href="<?php echo e(route('doctor.survey.create', [
                                'doctor' => auth()->user()->slug,
                                'patient' => $patient->id,
                                'survey' => 1,
                            ])); ?>">
                                <img src="<?php echo e(asset('img/stack.svg')); ?>" alt="">
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <?php if($survey2 = \App\SurveyDoctorPatient::where(['survey_id' => 2, 'doctor_id' => auth()->user()->id, 'patient_id' => $patient->id])->first()): ?>
                            <img src="<?php echo e(asset('img/correct.svg')); ?>" alt="">
                            <p>afgerond op: <?php echo e($survey2->created_at->format('d-m-Y')); ?></p>
                        <?php else: ?>
                            <a href="<?php echo e(route('doctor.survey.create', [
                                'doctor' => auth()->user()->slug,
                                'patient' => $patient->id,
                                'survey' => 2,
                            ])); ?>">
                                <img src="<?php echo e(asset('img/stack.svg')); ?>" alt="">
                            </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($patients->count() < 10): ?>
            <div class="row table__row">
                <div class="col-md-7">
                    <a href="<?php echo e(route('doctor.patient.create')); ?>">
                        <img src="img/sign_plus.svg" alt="">
                    </a>
                    <p class="gray__paragraph">[Patiëntnummer] [Naam] <small>(voor eigen gebruik)</small></p>
                </div>
                <div class="col-md-5">
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <img src="img/stack.svg" alt="">
                    </div>
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <img src="img/stack.svg" alt="">
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>