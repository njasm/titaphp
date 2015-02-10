<?php namespace App\Events;

use TitaPHP\Foundation\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use League\Flysystem\Exception;
use Symfony\Component\HttpFoundation\Response;

class ErrorHandler extends AbstractListener
{
	public function handle(EventInterface $event, $responseCode = 500, $e = null)
	{
		$app = Application::instance();

		if ($e instanceof \Exception || $e instanceof \ErrorException) {
			$app->get('Logger')->log(PHP_EOL.$e->getMessage().PHP_EOL.$e->getTraceAsString(), \TitaPHP\Foundation\Logger::FATAL);

			if ($app->getConfig('app.settings.mode') == 'development') {
				$app->get('whoops')->handleException($e);
			}
			else{
				// TODO: render a error template
				$responseStr = "<h2>Exception:</h2> <p>". $e->getMessage() .'</p><p>'.$e->getTraceAsString().'</p>';
				$response = $app->get('Response');
				$response->setContent($responseStr);
				$response->setStatusCode(500);
			}
		}
		else{
			// TODO: render 404 error template
			// TODO: log request url?
			$responseStr = '<h2>Page not found!</h2>';
			$response = $app->get('Response');
			$response->setContent($responseStr);
			$response->setStatusCode(404);
		}
	}
}