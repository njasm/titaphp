<?php

/*
 * $config['db']['mode'] = array( ... );
 * mode corresponds to app config var mode
 * */

$config['mail']['development'] = array(
	'server'    => 'smtp.sapo.pt',
	'port'      => 25,
	'username'  => 'nc1981@sapo.pt',
	'password'  => 'nc1981@',
	'from'		=> 'nunochaves@sapo.pt',
	'fromName'	=> 'Nuno Chaves',
	'replyTo'	=> 'nunochaves@sapo.pt',
);

$config['mail']['production'] = array(
    'server'    => 'smtp.sapo.pt',
    'port'      => 25,
    'username'  => 'nc1981@sapo.pt',
    'password'  => 'nc1981@',
    'from'		=> 'nunochaves@sapo.pt',
    'fromName'	=> 'Nuno Chaves',
    'replyTo'	=> 'nunochaves@sapo.pt',
);