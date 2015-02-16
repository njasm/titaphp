<?php namespace App\ServiceProviders;

use TitaPHP\Foundation\Application;
use TitaPHP\Foundation\ServiceProviderInterface;
use Illuminate\Database\Capsule\Manager as DatabaseManager;

class Eloquent implements ServiceProviderInterface
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