<?php namespace App\Events;

use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use League\Flysystem\Exception;

class ErrorHandler extends AbstractListener
{
	public function handle(EventInterface $event, $responseCode = 500, $e = null)
	{
		$app = \TitaPHP\Foundation\Application::getInstance();

		if ($e instanceof \Exception || $e instanceof \ErrorException) {
			$app->Logger->log(PHP_EOL.$e->getMessage().PHP_EOL.$e->getTraceAsString(), \TitaPHP\Foundation\Logger::FATAL);

			if ($app->getConfig('app.mode') == 'development') {
				$app->whoops->handleException($e);
			}
			else{
				// TODO: render a error template
				$responseStr = "<h2>Exception:</h2> <p>". $e->getMessage() .'</p><p>'.$e->getTraceAsString().'</p>';
				$app->sendResponse($responseStr, "text/html", $responseCode);
			}
		}
		else{
			// TODO: render 404 error template
			// TODO: log request url?
			$responseStr = '<h2>Page not found!</h2>';
			$app->sendResponse($responseStr, "text/html", $responseCode);
		}
	}
}