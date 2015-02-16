<?php

/*
 * Application general settings
 * */
$config['app']['settings'] = array(
	'debug'         => true,
    'basePath'      => null,
	'baseUrl'       => null,
	'index'			=> true,				// use index.php in url?
    'mode'          => 'development', 		// development, production
	'locale'		=> 'pt_PT',
	'language'		=> 'en',
	'currency'		=> 'EUR',
	'timezone'		=> 'Europe/Lisbon',
);


/*
 * Register your application providers here
 * The order in with you register your providers
 * matter to access previous registered providers
 * */
$config['app']['providers'] = [
	'\App\ServiceProviders\Whoops',
	'\App\ServiceProviders\FileSystem',
	'\App\ServiceProviders\Eloquent',
	'\App\ServiceProviders\Plates',
	'\App\ServiceProviders\SwiftMailer',
];

/*
 * Register events here
 * List of app life-cycle event hooks available:
 *   app-start - This hook is invoked right after the app start
 *   app-before-dispatch - This hook is invoked before the current matching route is dispatched
 *   app-after-dispatch - This hook is invoked after the current matching route is dispatched and successfully executed
 *   app-failed-dispatch - This hook is invoked when router cannot match request url
 *   app-end - This hook is invoked after the Response is sent to the client.
 *   app-error - This hook is invoked when a application error occurred
 *
 * You can register you own event hooks here by providing a name and a list of event classes
 * */

$config['app']['events'] = [
	'app-start' => [

	],
	'app-before-dispatch' => [

	],
	'app-after-dispatch' => [

	],
	'app-failed-dispatch' => [
		'\App\Events\DispatchFailed',
	],
	'app-end' => [
		'\App\Events\LogToFile',
		//'\App\Events\LogToDatabase',
	],
	'app-error' => [
		'\App\Events\ErrorHandler',
	],
];