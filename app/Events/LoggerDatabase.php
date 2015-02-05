<?php namespace App\Events;

use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use Model\Log;

class LoggerDatabase extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$app = \TitaPHP\Foundation\Application::getInstance();

		$log = new Log();
		$log->log = $app->Logger->getLogString();
		$log->created_at = date('Y-m-d H:i:s');
		$log->save();
	}
}