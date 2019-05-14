<?php $__env->startComponent('mail::message'); ?>
#Beste <?php echo e($name); ?>


Uw account is aangemaakt voor Convatec. U kunt inloggen op [http://convatec.medicaldigitals.com](http://convatec.medicaldigitals.com) met onderstaande gegevens:

**Email adres:** `<?php echo e($email); ?>`<br>
**Wachtwoord:** `<?php echo e($password); ?>`

Mocht het inloggen niet lukken, gelieve dan contact op te nemen met uw regiomanager. Deze kan een nieuw account voor u creëren.

Met vriendelijke groet,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
