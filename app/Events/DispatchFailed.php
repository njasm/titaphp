<?php namespace App\Events;

use Framework\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use League\Flysystem\Exception;
use Symfony\Component\HttpFoundation\Response;

class DispatchFailed extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$app = Application::instance();

		// TODO: render 404 error template
		// TODO: log request url?
		$responseStr = '<h2>Page not found!</h2>';
		$response = $app->get('Response');
		$response->setContent($responseStr);
		$response->setStatusCode(404);
	}
}