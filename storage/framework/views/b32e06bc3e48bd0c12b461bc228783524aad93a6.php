<?php $__env->startSection('show-penguins', 'show-penguins'); ?>

<?php $__env->startSection('content'); ?>
    <div class="top__buttons">
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
                <div class="heading__block heading__block-smaller">
                    <h4 class="heading__left">Welcome <?php echo e(auth()->user()->name); ?></h4>
                </div>
            </div>
            <div class="col-md-12">

            </div>
        </div>

        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row table__row">
                <div class="col-md-9">
                    <a class="confirm-delete" href="#" data-item="<?php echo e($doctor->name); ?>" data-form-id="<?php echo e(hash('md5', $doctor->id)); ?>">
                        <img src="<?php echo e(asset('img/sign.svg')); ?>" alt="Delete">
                    </a>
                    <form style="display: inline" id="<?php echo e(hash('md5', $doctor->id)); ?>" action="<?php echo e(route('manager.doctor.delete', ['doctor' => $doctor->slug])); ?>" method="post">
                        <?php echo e(method_field('delete')); ?>

                        <?php echo e(csrf_field()); ?>

                    </form>

                    <a href="<?php echo e(route('manager.doctor.show', ['doctor' => $doctor->slug])); ?>">
                        <p class="blue__paragraph"><?php echo e($doctor->name); ?></p>
                    </a>
                </div>
                <div class="col-md-3">
                    <span>Enquêtes afgerond: <?php echo e(getDoctorsFinishedSurveys($doctor)); ?>/10</span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>