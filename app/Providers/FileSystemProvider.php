<?php namespace Providers;

use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as LocalAdapter;

class FileSystemProvider extends AbstractListener
{
	public function handle(EventInterface $event)
	{
		$app = \Classes\App::getInstance();

		$app->container->set("FileSystem", function( $baseDir ) {
			return new Filesystem(new LocalAdapter($baseDir));
		});
	}
}