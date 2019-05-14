<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Het is gelukt!</strong> <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
