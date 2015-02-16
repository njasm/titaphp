<?php namespace App\Events;

use Framework\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

class LogToFile extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$app = Application::instance();

		$log = $app->get('Log')->getLogString();
		if ($log !== '') {
			$filePath = 'logs/'.date('Y_m').'.txt';
			$fileSystem = $app->get('FileSystem', array(STORAGE_PATH));
			if ($fileSystem->has($filePath)) {
				$log .= $fileSystem->read($filePath);
			}
			$fileSystem->put($filePath, $log);
		}
	}
}