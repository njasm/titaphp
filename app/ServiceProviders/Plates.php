<?php namespace App\ServiceProviders;

use Framework\Application;
use Framework\ServiceProviderInterface;
use League\Plates\Extension\URI;

class Plates implements ServiceProviderInterface
{

	public function register(Application $app)
    {
		$app->set("View", function() use($app) {
			$plates = new \League\Plates\Engine();
			$plates->loadExtension(new URI($app->Request->getPathInfo()));
			$plates->setDirectory(APP_PATH.'views');
			return $plates;
		});
    }
}