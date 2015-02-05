<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $this->e($title) ?></title>
    <style>
        body { 
        	margin: 0px 0px 40px 0px; 
        	font-family: Arial;	
		}
		
		.center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
    </style>

	<!-- BOOTSTRAP -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

</head>

<body>
	
<div class="container">
	<div class="row">
    	<div class="span12">
      		<div class="hero-unit center">
				<h1><?= $this->e($title) ?>&nbsp;&nbsp;<small></h1>
				<br />
				<p><?= $this->e($message) ?> <br/><br/>Use your browsers <b>Back</b> button to navigate to the page you have previously come from</p>
				<p><b>Or you could just press this neat little button:</b></p>
				<a href="<?= $this->uri('/cenas') ?>" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Take Me Home</a>
        	</div>
		</div>
	</div>
</div>

</html>

