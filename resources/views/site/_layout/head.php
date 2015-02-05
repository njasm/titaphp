
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <title><?= addslashes($pageTitle) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= addslashes($pageDescription) ?>">
    <meta name="keywords" content="<?= addslashes($pageKeywords) ?>">
	
	<!-- JQUERY & JQUERY UI (GOOGLE)  -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<!-- BOOTSTRAP -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FONT AWESOME -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="<?= PLUGINS_URL ?>fancybox2/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="<?= PLUGINS_URL ?>fancybox2/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<!-- Template scripts -->
	<link href="<?= CSS_URL ?>bootstrap-reset.css" rel="stylesheet">
	<link href="<?= CSS_URL ?>style.css" rel="stylesheet">
    <link href="<?= CSS_URL ?>style-responsive.css" rel="stylesheet" />
	
	<!-- My CSS -->
	<link href="<?= CSS_URL ?>my_styles.css" rel="stylesheet" />
	<link href="<?= CSS_URL ?>my_store.css" rel="stylesheet">
	
	<?php if( !empty($cssColorsFile) ): ?>
	<link href="<?= CSS_URL . $cssColorsFile ?>" rel="stylesheet">
	<?php endif; ?>
	
	<!-- My JS -->
	<script src="<?= JS_URL ?>my_functions.js"></script>
	
	<!-- Bootstrap IE fix -->
    <script>
          function toggleCodes(on) {
            var obj = document.getElementById('icons');
            
            if (on) {
              obj.className += ' codesOn';
            } else {
              obj.className = obj.className.replace(' codesOn', '');
            }
          }
    </script>
	
	<?= App::appConfig()->analyticsTrackingCode ?>