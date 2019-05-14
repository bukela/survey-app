<?php $__env->startSection('show-penguins', 'show-penguins'); ?>

<?php $__env->startSection('content'); ?>
    <div class="top__buttons">
        <div class="button-left">
            <a onclick="window.history.back(); return false;" href="<?php echo e(route('admin.manager.show', ['manager' => $doctor->manager])); ?>" class="button button__purple  button-left"><span>&lt; terug</span></a>
        </div>
        <div class="button-right">
            <div class="dropdown">
                <div class="dropdown">
                    <a href="#" class="button button__green" id="dropdown" data-toggle="dropdown"><span>Exporteer resultaten als .csv</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route('export.csv', ['survey_id' => 1])); ?>">Survey 1</a></li>
                        <li><a href="<?php echo e(route('export.csv', ['survey_id' => 2])); ?>">Survey 2</a></li>
                        <li><a href="<?php echo e(route('export.csv', ['survey_id' => 3])); ?>">Survey 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="heading__left"><?php echo e($doctor->name); ?></h1>
            </div>
            <div class="heading__block heading__block-smaller col-md-7">
                <h4 class="heading__left">Voortgang</h4>
                <div class="trophy__block">
                    <span>afgerond <?php echo e(getDoctorsFinishedSurveys($doctor)); ?>/10</span>
                    <img src="<?php echo e(asset('img/trophy.svg')); ?>" alt="">
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
        </div>

        <?php $__currentLoopData = $doctor->patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row table__row">
                <div class="col-md-7">
                    <?php if(surveys_for_delete($patient->id)): ?>
                        <p class="gray__paragraph">Patiënt <?php echo e(++$key); ?></p>
                    <?php else: ?>
                        <p class="green__paragraph">Patiënt <?php echo e(++$key); ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-5">
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <?php if($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 1, 'doctor_id' => $doctor->id, 'patient_id' => $patient->id])->first()): ?>
                            <img src="<?php echo e(asset('img/correct.svg')); ?>" alt="">
                            <p>afgerond op: <?php echo e($survey1->created_at->format('d-m-Y')); ?></p>
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/stack.svg')); ?>" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-11 col-xs-offset-1 enquete__text">
                        <?php if($survey1 = \App\SurveyDoctorPatient::where(['survey_id' => 2, 'doctor_id' => $doctor->id, 'patient_id' => $patient->id])->first()): ?>
                            <img src="<?php echo e(asset('img/correct.svg')); ?>" alt="">
                            <p>afgerond op: <?php echo e($survey1->created_at->format('d-m-Y')); ?></p>
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/stack.svg')); ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>