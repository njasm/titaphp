<?php
	if( $success ) 
		echo '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
				'<b>'.$this->translate('app.form','Your data has been successfully saved!') .'</b>'.
			  '</div>';
	
	if( count($errors) ){
		$errorsHtml = "";
		foreach ($errors as $error) 
			$errorsHtml .= '<br/>'.$error;
		
		echo '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
					'<b>'.$this->translate('app.form','Please fix the following errors:') .'</b>'.
					$errorsHtml .
			  '</div>';
	}
	
	echo '<div>- <i>'. $this->translate('app.form','fields marked in <font color="red">red</font> are mandatory') .'.</i></div> <br clear="both" />';
?>