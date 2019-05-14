 <?php $__env->startSection('content'); ?>
<div class="top__buttons">
    <div class="button-right">
        <a style="visibility: hidden;" href="<?php echo e(route('login')); ?>" class="button button__purple"><span>Inloggen</span></a>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading__block">
                <h1>Maak een account aan.</h1>
            </div>
            <form action="<?php echo e(route('register')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="name" class="input" type="text" placeholder="Volledige naam" id="volledige_naam" value="<?php echo e(old('name')); ?>" required />
                        <label for="volledige_naam">Volledige naam</label> <?php if($errors->has('name')): ?>
                        <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                        <?php endif; ?>
                    </div>
                    <p class="error__msg">Vul uw volledige naam in</p>
                </div>
                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="email" class="input" type="text" placeholder="E-mail" id="email" value="<?php echo e(old('email')); ?>" required/>
                        <label for="email">E-mail</label> <?php if($errors->has('email')): ?>
                        <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                        <?php endif; ?>
                    </div>
                    <p class="error__msg">Vul uw email adres in</p>
                    <p class="error__msg1">Voer een geldig email adres in</p>
                </div>
                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="password" class="input" type="password" placeholder="Wachtwoord" id="wachtwoord" required/>
                        <label for="wachtwoord">Wachtwoord</label> <?php if($errors->has('password')): ?>
                        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                        <?php endif; ?>
                    </div>
                    <p class="error__msg">Minimaal 8 tekens</p>
                    <p class="error__msg1">Vul uw wachtwoord in</p>
                </div>
                <div class="input__block">
                    <div class="text-wrapper">
                        <input name="password_confirmation" class="input" type="password" id="wachtwoord-repeat" placeholder="Wachtwoord" required/>
                        <label for="password_confirmation">Wachtwoord</label>
                    </div>
                    <p class="error__msg">Uw wachtwoorden komen niet overeen</p>
                </div>
                <div class="input__block">
                    <div class="text-wrapper">
                        <select name="manager" class="input" id="rayon__manager">
                                <option value="0" disabled selected>Selecteer Rayon Manager</option>
                                <?php $__currentLoopData = \App\Role::whereCode('manager')->first()->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($manager->id); ?>"><?php echo e($manager->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                    <p class="error__msg">Selecteer een Rayon Manager</p>
                </div>
                <?php if($errors->has('manager')): ?>
                <p class="text-danger"><?php echo e($errors->first('manager')); ?></p>
                <?php endif; ?>
                <div class="inloggen">
                    <button type="submit" class="button button__purple registreren"><span>Registreren</span></button>
                </div>
            </form>
            <h4 class="centered">Heeft u al een account? <a href="<?php echo e(route('login')); ?>">Log in</a></h4>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>