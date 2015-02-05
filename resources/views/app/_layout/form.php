<!DOCTYPE html>
<html lang="en">
  <head>
  	
    <?php
		echo View::forge(THEME . DIRECTORY_SEPARATOR .'_layout'. DIRECTORY_SEPARATOR .'head')
			->set('appTitle', '')
			->set('appDescription', '')
			->set('appKeywords', '')
			->render();
	?>

</head>

<body style="background-color: white; padding-top: 0px;">
    
    <!-- loading gif -->
    <div id="loadingPane">
        <img src="<?= IMAGES_PATH ?>loader.gif" />
    </div>
	
	<div id="formDialogDiv">
		<div class="container">
			<div class="row">
				<div class="col-xs-12" style="width: 96%">

					<?= $appContent ?>

				</div>
			</div>
		</div>
	</div>
    
	
	<script type="text/javascript">
		
		$(document).ready(function() {
			// slim scroll
			$('#formDialogDiv').slimScroll({
				height: '355px'
			});
		});
		
	</script>
	
</body>
</html>