<?php $__env->startSection('content'); ?>
<div class="top__buttons">
    <div class="button-left">
        <a href="<?php echo e(route('home')); ?>" class="button button__purple button-left"><span>&lt; terug</span></a>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-md-12 page_404">
            <h1>404</h1>
            <h5>Er ging iets fout, log uit en vervolgens opnieuw in om door te gaan.</h5>
            <p></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>