<!DOCTYPE html><html lang="en">    <head>        <?=			$this->insert('app/_layout/head',				['appTitle' => $appTitle, 'appDescription' => '', 'appKeywords' => '']			);        ?>    </head>	<body class="login-body">		<br/><br/><br/>		<div class="container">			<form class="form-signin" action="<?= BASE_URL ?>auth/login" method="post" style="max-width: 500px; padding: 15px; margin: 0 auto;">			<h2 class="form-signin-heading"><?= $this->translate('app.login', 'Admin Panel') ?></h2>			<div class="login-wrap">				<input type="text" name="username" placeholder="<?= $this->translate('app.login', 'Username') ?>" class="form-control" autofocus>				<input type="password" name="password" placeholder="<?= $this->translate('app.login', 'Password') ?>" class="form-control">				<!--				<label class="checkbox">					<input type="checkbox" value="remember-me"> Remember me					<span class="pull-right"> <a href="#"> Forgot Password?</a></span>				</label>				-->				<br/>				<button class="btn btn-lg btn-login btn-block" type="submit"><?= $this->translate('app.login', 'Sign in') ?></button>				<br/>				<?php if( $_POST && $error != "" ){ ?>                <div class="alert alert-danger">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>                    <?= $this->translate('app.login', $error) ?>                </div>                <?php } ?>			</div>			</form>		</div>    </body></html>