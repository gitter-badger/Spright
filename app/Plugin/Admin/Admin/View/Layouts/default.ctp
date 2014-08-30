<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title_for_layout; ?></title>
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('/admin/bootstrap/css/bootstrap.min.css');
		echo $this->Html->css('/admin/css/admin.css');
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

		<?php echo $this->element('header'); ?>

		<div class="container-fluid">
			<div class="row">
				<?php echo $this->element('sidebar'); ?>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<?php print $this->Session->flash('flash'); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>
		<script src="../../assets/js/docs.min.js"></script>
	</body>
</html>
