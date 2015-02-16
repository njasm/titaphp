<?php namespace App\Events;

use App\Model\Log;
use Framework\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

class LogToDatabase extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$logger = Application::instance()->get('Log');

		$log = new Log();
		$log->log = $logger->getLogString();
		$log->created_at = date('Y-m-d H:i:s');
		$log->save();
	}
}