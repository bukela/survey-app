<?php $__env->startSection('show-penguins', 'show-penguins'); ?>

<?php $__env->startSection('content'); ?>
    <div class="top__buttons">
        <div class="button-left">
            <a href="<?php echo e(route('admin.home')); ?>" class="button button__purple button-left"><span>&lt; terug</span></a>
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
                <div class="heading__block heading__block-smaller">
                    <h4 class="heading__left">Rayon Manager: <?php echo e($manager->name); ?></h4>
                </div>
            
            <div class="sorting row">
                <div class="col-md-8">
                    <!-- <p><a href="/admin/managers/<?php echo e($manager->slug); ?>/desc">Sorteren op naam</a>
                    <i class="fa fa-sort-down"></i>
                    </p>  -->

                    <p>
                        Sorteren op naam: <a href="/admin/managers/<?php echo e($manager->slug); ?>/desc"><button class="sorter-button" style="line-height: 23px;color: #424040"><i class="fas fa-sort-alpha-down"></i></button></a>
                    </p>         
                </div>
                <div class="col-md-4">
                        <span class="pull-right" style="margin-right:4%">Sorteren op voltooid:
                            <button class="sorter-button" id="toggle-click"><i class="fas fa-sort-amount-down"></i></button>
                            
                        </span>
                       </div>
                </div>
            </div>
        </div>
        <div class="main-div">
        <?php $__currentLoopData = $manager->doctors->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
            <div class="row table__row doctor-div">
                <div class="col-md-9">
                    <a class="confirm-delete" href="#" data-item="<?php echo e($doctor->name); ?>" data-form-id="<?php echo e(hash('md5', $doctor->id)); ?>">
                        <img src="<?php echo e(asset('img/sign.svg')); ?>" alt="Delete">
                    </a>
                    <form style="display: inline" id="<?php echo e(hash('md5', $doctor->id)); ?>" action="<?php echo e(route('admin.doctor.delete', ['doctor' => $doctor->slug])); ?>" method="post">
                        <?php echo e(method_field('delete')); ?>

                        <?php echo e(csrf_field()); ?>

                    </form>

                    <a href="<?php echo e(route('admin.doctor.show', ['doctor' => $doctor->slug])); ?>">
                        <p class="blue__paragraph"><?php echo e(($doctor->name)); ?></p>
                    </a>
                </div>
                <div class="col-md-3">
                    <span>
                        <div class="dropdown__export">
                    <a href="#" onclick="return false;">&downarrow; CSV</a>
                    <div class="dropdown-content">
                        <a style="margin-top: 15px"
                           href="<?php echo e(route('export.csv', ['survey_id' => 1, 'role' => 'doctor', 'id' => $doctor->id])); ?>">Survey 1</a><br>
                        <a style="margin-top: 15px"
                           href="<?php echo e(route('export.csv', ['survey_id' => 2, 'role' => 'doctor', 'id' => $doctor->id])); ?>">Survey 2</a><br>
                        <a style="margin-top: 15px"
                           href="<?php echo e(route('export.csv', ['survey_id' => 3, 'role' => 'doctor', 'id' => $doctor->id])); ?>">Survey 3</a>
                    </div>
                </div>
                        
                        Enquêtes afgerond: <span class="finished"><?php echo e(getDoctorsFinishedSurveys($doctor)); ?>/10</span>
                    </span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    jQuery(document).ready(function($){

        $('#toggle-click').on('click',function(){
        if($(this).attr('data-click-state') == 1) {
        $(this).attr('data-click-state', 0)
        var numericallyOrderedDivs = $(".doctor-div").sort(function (a, b) {
            var keyA = parseInt($(a).find(".finished").text(), 10);
            var keyB = parseInt($(b).find(".finished").text(), 10);
            
            return keyA > keyB ? 1 : -1; 
        });
        numericallyOrderedDivs.each(function(index, value) { 
            $(".main-div").append(value);
         });
        } else {
        $(this).attr('data-click-state', 1)
        var numericallyOrderedDivs = $(".doctor-div").sort(function (a, b) {
            var keyA = parseInt($(a).find(".finished").text(), 10);
            var keyB = parseInt($(b).find(".finished").text(), 10);
            
            return keyA < keyB ? 1 : -1; 
        });
        numericallyOrderedDivs.each(function(index, value) { 
            $(".main-div").append(value);
         });
        }
        
        });
        
        });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>