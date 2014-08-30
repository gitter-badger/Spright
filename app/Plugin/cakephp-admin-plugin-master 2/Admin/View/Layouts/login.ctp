<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Signin</title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css('/admin/bootstrap/css/bootstrap.min.css');
			echo $this->Html->css('/admin/css/login.css');
		?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<?php
			echo $this->Html->script('/admin/js/html5shiv.js');
			echo $this->Html->script('/admin/js/respond.min.js');
		?>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php echo $this->fetch('content'); ?>
		</div>
	</body>
</html>
