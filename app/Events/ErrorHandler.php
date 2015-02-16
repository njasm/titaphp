<?php namespace App\Events;

use Framework\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use League\Flysystem\Exception;
use Symfony\Component\HttpFoundation\Response;

class ErrorHandler extends AbstractListener
{
	public function handle(EventInterface $event, $e = null)
	{
		$app = Application::instance();

		$app->get('Log')->fatal(PHP_EOL.$e->getMessage().PHP_EOL.$e->getTraceAsString());

		if ($app->getConfig('app.settings.mode') == 'development') {
			$app->get('Whoops')->handleException($e);
		}
		else{
			// TODO: render a error template
			$responseStr = "<h2>Exception:</h2> <p>". $e->getMessage() .'</p><p>'.$e->getTraceAsString().'</p>';
			$response = $app->get('Response');
			$response->setContent($responseStr);
			$response->setStatusCode(500);
		}
	}
}