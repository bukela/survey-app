<!DOCTYPE html>
<html>

<head>
    <title>Survey Webapp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet" type="text/css" />

</head>

<body>
    <header>
        <div class="header__logo">
            <a href="<?php echo e(route('login')); ?>">
                <img src="<?php echo e(asset('img/logo.svg')); ?>" alt="logo">
            </a>
        </div>

        <?php if(auth()->check()): ?>
        <a href="#" class="logout" id="logout-button">uitloggen</a>
        <form id="logout-form" method="post" action="<?php echo e(route('logout')); ?>"><?php echo e(csrf_field()); ?></form>
        <?php endif; ?>

    </header>
    <main>

        <?php echo $__env->make('_alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo $__env->yieldContent('content'); ?>

    </main>
    <footer>
        <div class="footer">
            <div class="footer__logo">
                <a href="https://www.convatec.nl/wondzorg/aquacel-wondverband/aquacel-foam/" target="_blank">
                    <img src="<?php echo e(asset('img/aquacel.svg')); ?>" alt="logo">
                </a>
            </div>
            <div class="footer__penguins <?php echo $__env->yieldContent('show-penguins'); ?>">
                <img src="<?php echo e(asset('img/penguins.png')); ?>" alt="">
            </div>
            <div class="footer__disclaimer">
                <a href="<?php echo e(asset('Disclaimer_Convatec.pdf')); ?>">Disclaimer</a>
            </div>
        </div>
    </footer>

    <?php echo $__env->make('_confirm-delete-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
