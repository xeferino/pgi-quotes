<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/styles-pdf.css')); ?>">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Mensaje de Notificación de Documento</h2>

				<p class="text-center">Este es un mensaje de notificación que se ha hecho un documento desde el sistema PGI, para su persona.</p>
				
				<p class="text-center"><a href="<?php echo e(url('docs/pdf')); ?>/<?php echo e($datos->id); ?>"><?php echo e(url('docs/pdf')); ?>/<?php echo e($datos->id); ?></a></p>
			</div>
		</div>
	</div>

	
</body>
</html>