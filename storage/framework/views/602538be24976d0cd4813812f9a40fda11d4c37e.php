 <?php $__env->startSection('content'); ?>
<div class="top__buttons">
    <div class="button-left">
        <a href="<?php echo e(route('login')); ?>" class="button button__purple  button-left"><span>&lt; terug</span></a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading__block">
                <h1>Reset Password</h1>
            </div>
            <form action="<?php echo e(route('password.request')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="token" value="<?php echo e($token); ?>">

                <div class="input__block">
                    <div class="text-wrapper">
                        <input id="email" type="text" class="input" name="email" placeholder="Email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" required> <?php if($errors->has('email')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span> <?php endif; ?>
                        <label for="email">Email</label> <?php if($errors->has('email')): ?>
                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?>
                    </div>
                    <p class="error__msg">Vul uw email adres in</p>
                    <p class="error__msg1">Voer een geldig email adres in</p>
                </div>

                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="password" class="input" type="password" placeholder="Wachtwoord" required id="wachtwoord" />
                        <label for="password">Wachtwoord</label> <?php if($errors->has('password')): ?>
                        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                        <?php endif; ?>
                    </div>
                    <p class="error__msg">Minimaal 8 tekens</p>
                    <p class="error__msg1">Vul uw wachtwoord in</p>
                </div>

                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="password_confirmation" class="input" type="password" id="wachtwoord-repeat" required placeholder="Wachtwoord bevestigen" />
                        <label for="password_confirmation">Wachtwoord bevestigen</label>
                    </div>
                    <p class="error__msg">Uw wachtwoorden komen niet overeen</p>
                </div>

                <div class="form-group">
                    <div class="inloggen">
                        <button type="submit" class="button button__purple reset_password">
                                    Reset Password
                                </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>