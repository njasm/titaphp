<?php namespace App\Providers;

use TitaPHP\Foundation\ProviderInterface;
use TitaPHP\Foundation\Application;
use Illuminate\Database\Capsule\Manager as DatabaseManager;

class EloquentProvider implements ProviderInterface
{

    public function register(Application $app)
    {
		$appMode = $app->getConfig('app.settings.mode');
		$database = new DatabaseManager;
		$database->addConnection($app->getConfig('db.'.$appMode));
		$database->setAsGlobal();
		$database->bootEloquent();
    }

}