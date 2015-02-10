<?php namespace App\Providers;

use TitaPHP\Foundation\ProviderInterface;
use TitaPHP\Foundation\Application;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;

class WhoopsProvider implements ProviderInterface
{

	public function register(Application $app)
	{
		$whoops = new \Whoops\Run;
		$whoops->allowQuit(false);
		$handler = new \Whoops\Handler\PrettyPageHandler;
		$handler->setPageTitle("Whoops! There was a problem.");
		$whoops->pushHandler($handler);
		$whoops->register();

		$app->set('whoops', $whoops);
	}

}