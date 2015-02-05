<?php namespace App\Providers;

use TitaPHP\Foundation\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;

class WhoopsProvider extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$whoops = new \Whoops\Run;
		$whoops->allowQuit(false);
		$handler = new \Whoops\Handler\PrettyPageHandler;
		$handler->setPageTitle("Whoops! There was a problem.");
		$whoops->pushHandler($handler);
		$whoops->register();

		$app = Application::getInstance();
		$app->whoops = $whoops;
	}
}