<?php
	if( $success ) 
		echo '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
				$this->translate('Your data has been successfully saved!') .
			  '</div>';
	
	if( count($errors) ){
		$errorsHtml = "";
		foreach ($errors as $error) 
			$errorsHtml .= '<br/>'.$error;
		
		echo '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
					$this->translate('Please fix the following errors:') .'<br/>'.
					$errorsHtml .
			  '</div>';
	}
	
	echo '<div>- <i>'. $this->translate('fields marked in <font color="red">red</font> are mandatory.') .'</i></div> <br clear="both" />';
?>