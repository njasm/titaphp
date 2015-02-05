<?php namespace Events;

use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

class LoggerFile extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$app = \Classes\App::getInstance();

		// TODO: change to append when added to Flysystem
		$log = $app->Logger->getLogString();
		if ($log !== '') {
			$filePath = 'logs/'.date('Y_m').'.txt';
			$fileSystem = $app->container->get('FileSystem', array(STORAGE_PATH));
			if ($fileSystem->has($filePath)) {
				$log .= $fileSystem->read($filePath);
			}
			$fileSystem->put($filePath, $log);
		}
	}
}