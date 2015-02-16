<?php namespace App\ServiceProviders;

use TitaPHP\Foundation\Application;
use TitaPHP\Foundation\ServiceProviderInterface;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;

class Whoops implements ServiceProviderInterface
{

	public function register(Application $app)
	{
		$whoops = new \Whoops\Run;
		$whoops->allowQuit(false);
		$handler = new \Whoops\Handler\PrettyPageHandler;
		$handler->setPageTitle("Whoops! There was a problem.");
		$whoops->pushHandler($handler);
		$whoops->register();

		$app->set('Whoops', $whoops);
	}

}