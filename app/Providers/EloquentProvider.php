<?php namespace Providers;

use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;
use \Illuminate\Database\Capsule\Manager as DatabaseManager;

class EloquentProvider extends AbstractListener
{
    public function handle(EventInterface $event)
    {
        $app = \Classes\App::getInstance();
		$appMode = $app->getConfig('app.mode');
		$database = new DatabaseManager;
		$database->addConnection($app->getConfig('db.'.$appMode));
		$database->setAsGlobal();
		$database->bootEloquent();
    }
}