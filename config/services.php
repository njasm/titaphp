<?php

/*
 * Register your events and providers here
 * */

$config['services'] = [

    /*
     * Register service providers here
     */
    'app-providers' => [
		'\Providers\WhoopsProvider',
		'\Providers\FileSystemProvider',
		'\Providers\EloquentProvider',
		'\Providers\PlatesProvider',
        '\Providers\LoggerProvider',
        '\Providers\SwiftMailerProvider',
    ],

	/*
	 * Register events here
	 * List of app life-cycle event hooks available:
	 *   app-start - This hook is invoked right after the app start
	 *   app-before-dispatch - This hook is invoked before the current matching route is dispatched
	 *   app-after-dispatch - This hook is invoked after the current matching route is dispatched and successfully executed
	 *   app-failed-dispatch - This hook is invoked when router cannot match request
	 *   app-end - This hook is invoked after the Response is sent to the client.
	 *   app-error - This hook is invoked when a application error occurred
	 *
	 * You can register you own event hooks here by providing a name and a list of event classes
	 * */
	'app-start' => [

	],
    'app-before-dispatch' => [

    ],
    'app-after-dispatch' => [

    ],
	'app-failed-dispatch' => [
		'\Events\ErrorHandler',
	],
    'app-end' => [
		'\Events\LoggerFile',
		'\Events\LoggerDatabase',
    ],
	'app-error' => [
		'\Events\ErrorHandler',
	],
];