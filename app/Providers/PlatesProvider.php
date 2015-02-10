<?php namespace App\Providers;

use TitaPHP\Foundation\ProviderInterface;
use TitaPHP\Foundation\Application;
use League\Plates\Extension\URI;

class PlatesProvider implements ProviderInterface
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