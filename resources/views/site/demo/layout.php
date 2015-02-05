<!DOCTYPE html>
<html lang="en">
<head>
	<!-- JQUERY & JQUERY UI (GOOGLE)  -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

	<!-- BOOTSTRAP -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container">
	<br/><br/>
	<h4><?= $title ?></h4>
	<br/>
	<?= $this->section('content') ?>
</div>

</body>
</html>