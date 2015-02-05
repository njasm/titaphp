<!DOCTYPE html>
<html lang="en">
    <head>
		<?php
		echo View::forge(THEME . DIRECTORY_SEPARATOR .'_layout'. DIRECTORY_SEPARATOR .'head')
				->set('appTitle', $appTitle)
				->set('appDescription', $appDescription)
				->set('appKeywords', $appKeywords)
				->render();
		?>
    </head>

    <body>
		<!-- Loader -->
		<div id="loadingPane"><i class="fa fa-spinner fa fa-spin fa fa-2x"></i> <span>&nbsp; <?= $this->translate('app.template', 'Loading') ?>...</span> </div>
		
		<section id="container" class="">
			<!--header start-->
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-align-justify tooltips sidebar-toggle" style="cursor: pointer"></div>
				</div>
				<!--logo start-->
				<a href="#" class="logo" ><?= $this->translate('app.template', 'Admin Panel') ?></span></a>
				<!--logo end-->
				<div class="nav notify-row hidden-xs hidden-sm" id="top_menu">
					
					<!--  notification start -->
					<ul class="nav top-menu">
						
						<li style="margin-left: 30px; margin-top: 6px;">
							<i class="fa fa-user" style="padding-left: 16px;"></i> &nbsp; 
							<?= isset($onlineGuests) ? $onlineGuests : 0 ?> <?= $this->translate('app.template', 'guests online') ?>
							<i class="fa fa-user" style="padding-left: 16px;"></i> &nbsp; 
							<?= isset($onlineClients) ? $onlineClients : 0 ?> <?= $this->translate('app.template', 'clients online') ?>
							<i class="fa fa-user" style="padding-left: 16px;"></i> &nbsp; 
							<?= isset($onlineUsers) ? $onlineUsers : 0 ?> <?= $this->translate('app.template', 'users online') ?>
						</li>	
					</ul>
				</div>
				<div class="top-nav ">
					
					
					<ul class="nav pull-right top-menu">
						<li>
							<?php foreach( $languages as $language ): ?>
							<a href="<?= Uri::create('app/dashboard/changeLanguage/:lang', array('lang' => $language->idLanguage)) ?>" class="pull-right" style="padding-left: 8px;"><img src="<?= IMAGES_URL ?>flags/<?= $language->flag ?>" /></a>
							<?php endforeach; ?>
						</li>
						<!-- user login dropdown start-->
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<img src="<?= IMAGES_URL.'avatar2.png' ?>" class="img-circle" style="max-height: 25px;" />
								<span class="username"><?= Auth::getUser()->username ?></span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu extended logout">
								<div class="log-arrow-up"></div>
								<li style="width: 50%">
									<a href="<?= Uri::create('app/users/mySettings') ?>" class="modal-form" title="<?= $this->translate('app.menu', 'Personal Settings') ?>">
										<i class="fa fa-suitcase"></i> <?= $this->translate('app.menu', 'Personal Settings') ?>
									</a>
								</li>
								<li style="width: 50%">
									<a href="<?= Uri::create('app/users/myPassword') ?>" class="modal-form" title="<?= $this->translate('app.menu', 'Change Password') ?>">
										<i class="fa fa-key"></i> <?= $this->translate('app.menu', 'Change Password') ?></a>
								</li>
								<li>
									<a href="<?= Uri::create('app/auth/logout') ?>">
										<i class="fa fa-power-off"></i> <?= $this->translate('app.menu', 'Logout') ?>
									</a>
								</li>
							</ul>
						</li>
						<!-- user login dropdown end -->
					</ul>
				</div>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				<div id="sidebar" class="nav-collapse">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu">
						
						<?php 
							$i=1;
							foreach( Controller_App_AppTemplate::getMenu() as $menuItem ): 
						?>
                        
							<?php 
							if( !isset($menuItem['items']) ): 
								$params = isset($menuItem['params']) ? $menuItem['params'] : "";	
							?>
							<li class="sub-menu" id="sidebar_menu_<?= ($i++) ?>">
								<a href="<?= Uri::create('app/'.$menuItem['controller'].'/'.$menuItem['action'].'/'.$params) ?>">
									<i class="<?= $menuItem['icon'] ?>"></i>
									<span><?= $this->translate('app.menu', $menuItem['title']) ?></span>
								</a> 
							</li>
							<?php else: ?>
							<li class="sub-menu" id="sidebar_menu_<?= ($i++) ?>">
								<a href="javascript:;" class="">
									<i class="<?= $menuItem['icon'] ?>"></i>
									<span><?= $this->translate('app.menu', $menuItem['title']) ?></span>
									<span class="arrow"></span>
								</a>
								<ul class="sub">
									<?php
									foreach( $menuItem['items'] as $subMenuItem ): 
										$params = isset($subMenuItem['params']) ? $subMenuItem['params'] : "";
									?>
									<li> <a href="<?= Uri::create('app/'.$subMenuItem['controller'].'/'.$subMenuItem['action'].'/'.$params) ?>"><?= $this->translate('app.menu', $subMenuItem['title']) ?></a> </li>
									<?php endforeach; ?>
								</ul>
							</li>
							<?php endif; ?>
							
						<?php endforeach; ?>
						
					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<section class="wrapper">
					
					<div class="row">
						<div class="col-lg-12">
							
							<?php if( !$multipleWidgets ): ?>
							
							<section class="panel">
								
								<div class="revenue-head" style="background-color: #6883a3">
									<span style="background-color: #2a3542">
										<i class="fa fa-list-ul"></i>
									</span>
									<h3><?= $appTitle ?></h3>
								</div>
								<div class="panel-body">
									
									<ol class="breadcrumb"><?= $appBreadcrumbs ?></ol>
									
									<?= $appContent ?>

								</div>
							</section>
							
							<?php else: ?>
							
							<?= $appContent ?>
							
							<?php endif; ?>
						</div>
					</div>
					
					
				</section>
			</section>
			<!--main content end-->
		</section>

	</body>
</html>

