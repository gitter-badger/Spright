<!DOCTYPE html>
<html lang="en">
  <head>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');


    
	?>

  	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" />
  	<!-- Latest compiled and minified JavaScript -->
  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
 
 <!--Include Touch Punch file to provide support for touch devices-->
 <script type="text/javascript" src="/cafmworks/js/jquery.chained.remote.min.js" ></script>

    
 
 <!--ParamQuery Grid files-->
 <link rel="stylesheet" href="/cafmworks/pqgrid.min.css" />
 <script type="text/javascript" src="/cafmworks/pqgrid.min.js" ></script>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    	body{ padding: 70px 0px; }
    </style>

  </head>

  <body>

    <?php echo $this->Element('navigation'); ?>

    <div class="container">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

    </div><!-- /.container -->

    <div>Load time: <?php echo round(microtime(true) - TIME_START, 3); ?>


<script>

if(<?php echo round(microtime(true) - TIME_START, 3); ?>>2){
  alert('Page load > 2 seconds');
}
</script>


     </div>

  </body>
</html>
