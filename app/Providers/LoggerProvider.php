<?php namespace App\Providers;

use \TitaPHP\Foundation\Application;
use \TitaPHP\Foundation\Logger;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

class LoggerProvider extends AbstractListener
{
    public function handle(EventInterface $event)
    {
		$app = Application::getInstance();

		$app->container->singleton("Logger", function() {
			return new Logger;
		});
    }

}