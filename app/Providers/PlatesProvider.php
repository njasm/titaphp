<?php namespace App\Providers;

use \TitaPHP\Foundation\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use League\Plates\Extension\URI;

class PlatesProvider extends AbstractListener
{
    public function handle (EventInterface $event)
    {
		$app = Application::getInstance();

		$app->container->set("View", function() use($app) {
			$plates = new \League\Plates\Engine();
			$plates->loadExtension(new URI($app->Request->getPathInfo()));
			//$plates->loadExtension(new PlatesTranslateExt());
			$plates->setDirectory(APP_PATH.'views');
			return $plates;
		});
    }
}


use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class PlatesTranslateExt implements ExtensionInterface
{
	public function register(Engine $engine)
	{
		$app = \Classes\App::getInstance();
		$app->View->registerFunction('translate', [$this, 'translate']);
	}

	public function translate()
	{
		return call_user_func_array('\Classes\I18n::translate', func_get_args());
	}
}