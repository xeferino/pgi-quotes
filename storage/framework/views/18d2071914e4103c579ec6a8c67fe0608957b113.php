<?php $__env->startSection('content'); ?>

<h1 class="text-center" style="font-size: 7em; margin-top: 1em; color: rgb(179, 179, 179)">404</h1>
<p class="text-center" style="font-size: 1.5em;  color: rgb(179, 179, 179)">
	<?php echo e($exception->getMessage()); ?>

</p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>