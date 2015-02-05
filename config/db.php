<?php

/*
 * $config['db']['mode'] = array( ... );
 * mode corresponds to app config var mode
 * */

$config['db']['development'] = array(
    'driver'    => 'mysql',
    'host'      => 'nunochaves.com',
    'port'      =>  3306,
    'database'  => 'nchaves_jupitern_cms',
    'username'  => 'nchaves_admin',
    'password'  => 'nchaves81@',
    'prefix'    => '',
    'charset'   => "utf8",
    'collation' => "utf8_unicode_ci",
);

$config['db']['production'] = array(
	'driver'    => 'mysql',
	'host'      => '',
	'port'      =>  3306,
	'database'  => '',
	'username'  => '',
	'password'  => '',
	'prefix'    => '',
	'charset'   => "utf8",
	'collation' => "utf8_unicode_ci",
);