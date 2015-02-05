<!DOCTYPE html>
<html>
  <head>
	<?php
		echo View::forge(THEME . DIRECTORY_SEPARATOR .'_layout'. DIRECTORY_SEPARATOR .'head')
				->set('appName', $appName)
				->set('appAuthor', $appAuthor)
				->set('pageTitle', $pageTitle)
				->set('pageDescription', $pageDescription)
				->set('pageKeywords', $pageKeywords)
				->set('cssColorsFile', $cssColorsFile)
				->render();
	?>
</head>

<body>
	
	<div id="loadingPane"><i class="fa fa-spinner fa fa-spin fa fa-2x"></i> <span>&nbsp; <?= $this->translate('site.template', 'Loading') ?>...</span> </div>
	
	<div class="navbar navbar-inverse navbar-fixed-top topMenu">
		<div class="container">
			<div class="row">
				<div class="col-xs-5">
					
					<?php if (empty($appConfig->appLogo)) : ?>
					<h1 style="padding-left: 25px;"><?= $appConfig->appName ?></h1>
					<?php else : ?>
					<img class="img-responsive" style="padding-left: 25px; max-height: 72px;" src="<?= UPLOAD_URL . $appConfig->appLogo ?>" alt="<?= $appConfig->appAuthor ?>" />
					<?php endif; ?>
				
				</div>
				<div class="col-xs-7 pull-right" style="padding-top: 28px;">
					
					<button type="button" class="navbar-toggle tooltips" data-toggle="collapse" data-target=".navbar-collapse" style="margin-left: 20px; margin-top: -10px; color: white;">
						<i class="fa fa-align-justify"></i>
					</button>
					
					<?php if( count($languages) > 1 ): ?>
					<div style="padding-right: 6px; padding-right: 12px;">
						<?php foreach( $languages as $language ): ?>
						<a href="<?= Uri::create('page/changeLanguage/:lang', array('lang' => $language->idLanguage)) ?>" style="float: right; padding-left: 8px;"><img src="<?= IMAGES_URL ?>flags/<?= $language->flag ?>" /></a>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="collapse navbar-collapse">
				
				<!-- MENU BAR -->
				<ul class="nav navbar-nav">
					<?php foreach( Controller_SiteTemplate::getMenu(1) as $menuItem ): ?>

						<?php if( !isset($menuItem['childs']) ): ?>
						<li> <a href="<?= Uri::create($menuItem['link']) ?>"><?= $menuItem['title'] ?></a> </li>
						<?php else: ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $menuItem['title'] ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php foreach( $menuItem['childs'] as $subMenuItem ): ?>
									<li> <a href="<?= Uri::create($menuItem['link']) ?>"><?= $subMenuItem['title'] ?></a> </li>
								<?php endforeach; ?>
							</ul>
						</li>
						<?php endif; ?>

					<?php endforeach; ?>
				</ul>
				
			</div>
					
		</div>
	</div>
	
	<div class="container"><!-- container -->
		<section id="container">
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper"><!-- page start-->
					
					<?php
						if( $controllerAction['controller'] == 'store' ): 
							echo $pageContent;
						else:
					?>
					
					<div class="row"><!-- START MAIN ROW -->
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading" style="font-size: 20px"> <?= $pageTitle ?> </header>
								<div class="panel-body" style="padding: 30px;">
									
									<?= $pageContent ?>
									
								</div>
							</section>
						</div>
					</div>
					
					<?php endif; ?>
					
				</section><!-- page end-->	
			</section>
		</section>
	</div><!-- /.container -->
	
	<!-- Footer menu -->
	<?php
		$footerMenu = Controller_SiteTemplate::getMenu(2);
		if( $footerMenu ):
	?>
	<footer class="site-footer-nav">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<ul class="nav nav-pills footerNav">
						<?php foreach( $footerMenu as $menuItem ): ?>
						<li> <a href="<?= Uri::create($menuItem['link']) ?>"><i class="fa fa-arrow-right"></i> <?= $menuItem['title'] ?></a> </li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<footer class="site-pre-footer">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 col-xs-12">
					<div style="margin-left: 25px; margin-right: 25px;">
						
						<p style="line-height: 19px;">
							<?php if (!empty($appConfig->appLogo)) : ?>
							<img class="img-responsive desaturate" style="margin-bottom: 10px; margin-right: 20px; max-height: 70px; max-width: 150px;" 
								 src="<?= UPLOAD_URL . $appConfig->appLogo ?>" alt="<?= $appConfig->appAuthor ?>" />
							<?php else: ?>
							<h4><?= $this->translate('site.template.footer', 'ABOUT US') ?></h4>
							<?php endif; ?>
							<?= Model_Template::getTemplateContent('FOOTER_ABOUT_US') ?>
						</p>
					</div>
					<br clear="both" />
				</div>
				
				<div class="col-md-5 col-md-offset-1 col-xs-12">
					<div style="margin-left: 25px; margin-right: 25px;">
						<h4><?= $this->translate('site.template.footer', 'CONTACT US') ?></h4>
						<p style="line-height: 24px; text-transform: uppercase;">
							<?php if( !empty($configDetail->address) ): ?>
								<i class="fa fa-home"></i> &nbsp; <?= $configDetail->address .' '. $configDetail->postalCode .' '. $configDetail->locality ?><br>
							<?php endif; ?>

							<?php if( !empty($configDetail->phone1) ): ?>
								<i class="fa fa-phone-square"></i> &nbsp; <?= $configDetail->phone1 ?><br>
							<?php endif; ?>

							<?php if( !empty($configDetail->phone2) ): ?>
								<i class="fa fa-phone-square"></i> &nbsp;&nbsp;<?= $configDetail->phone2 ?><br>
							<?php endif; ?>

							<?php if( !empty($configDetail->phone3) ): ?>
								<i class="fa fa-phone-square"></i> &nbsp;&nbsp;<?= $configDetail->phone3 ?><br>
							<?php endif; ?>

							<?php if( !empty($configDetail->email1) ): ?>
								<i class="fa fa-envelope-o"></i> &nbsp;&nbsp;<a href="mailto:<?= $configDetail->email1 ?>"><?= $configDetail->email1 ?></a><br>
							<?php endif; ?>

							<?php if( !empty($configDetail->email2) ): ?>
								<i class="fa fa-envelope-o"></i> &nbsp;&nbsp;<a href="mailto:<?= $configDetail->email2 ?>"><?= $configDetail->email2 ?></a><br>
							<?php endif; ?>

							<?php if( !empty($configDetail->email3) ): ?>
								<i class="fa fa-envelope-o"></i> &nbsp;&nbsp;<a href="mailto:<?= $configDetail->email3 ?>"><?= $configDetail->email3 ?></a><br>
							<?php endif; ?>
							
						</p>
						<br clear="both" />
						
						<div class="social-icons">
							<ul>
								<?php if( !empty($configDetail->twitter) ): ?>
								<li class="twitter" style="background-color: #f0f0f0">
									<a href="<?= $configDetail->twitter ?>" target="_blank">Twitter</a>
								</li>
								<?php endif; ?>
								
								<?php if( !empty($configDetail->facebook) ): ?>
								<li class="facebook" style="background-color: #f0f0f0">
									<a href="<?= $configDetail->facebook ?>" target="_blank">Facebook</a>
								</li>
								<?php endif; ?>
								
								<?php if( !empty($configDetail->youtube) ): ?>
								<li class="youtube" style="background-color: #f0f0f0">
									<a href="<?= $configDetail->youtube ?>" target="_blank">YouTube</a>
								</li>
								<?php endif; ?>
								
								<?php if( !empty($configDetail->googlePlus) ): ?>
								<li class="googleplus" style="background-color: #f0f0f0">
									<a href="<?= $configDetail->googlePlus ?>" target="_blank">Google +r</a>
								</li>
								<?php endif; ?>
								
								<?php if( !empty($configDetail->linkedin) ): ?>
								<li class="linkedin" style="background-color: #f0f0f0">
									<a href="<?= $configDetail->linkedin ?>" target="_blank">LinkedIN</a>
								</li>
								<?php endif; ?>
								
							</ul>
						</div>
						
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12" style="text-align: center; margin-top: 16px; margin-bottom: 8px;">
					<?= $this->translate('site.template.footer', '© Copyright :year :appName - all rights reserved', array(':year' => date('Y'), ':appName' => $appAuthor)); ?>
				</div>
			</div>
			
		</div>
	</footer>
	
</body>
</html>

