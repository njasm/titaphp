<?php

// array( $method, $route, $target, $name )

$config['routes'] = array(
	// demo
	array('GET', 'demo-index', 'Site\Demo:index', 'demo-index'),
	array('GET', '/test/[i:id]?', 'Site\Demo:test', 'demo-test'),
	array('GET|POST', 'demo-edit/[i:id]?', 'Site\Demo:edit', 'demo-edit'),
	array('GET', 'demo-delete/[i:id]', 'Site\Demo:delete', 'demo-delete'),


    // Site
	array('GET', '', 'Site\Home:getString', 'home'),
    array('GET', 'getJson', 'Site\Home:getJson', 'getJson'),
    array('GET', 'getXML', 'Site\Home:getXML', 'getXML'),
    array('GET', 'sendEmail', 'Site\Home:sendEmail', 'sendEmail'),


	// APP
	array('GET', 'app/auth-index', 'App\Auth:index', 'app-auth-index'),
	array('GET', 'app/auth-login', 'App\Auth:login', 'app-auth-login'),
	array('GET', 'app/auth-logout', 'App\Auth:logout', 'app-auth-logout'),
	array('GET', 'app/auth-recover', 'App\Auth:recover', 'app-auth-recover'),

	array('GET', 'app/dashboard', 'App\Dashboard:index', 'app-dashboard-index'),

);
