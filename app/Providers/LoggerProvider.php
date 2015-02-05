<?php namespace Providers;

use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

class LoggerProvider extends AbstractListener
{
    public function handle(EventInterface $event)
    {
		$app = \Classes\App::getInstance();

		$app->container->singleton("Logger", function() {
			return new \Classes\Logger;
		});
    }

}