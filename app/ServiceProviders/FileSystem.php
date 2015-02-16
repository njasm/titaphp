<?php namespace App\ServiceProviders;

use Framework\Application;
use Framework\ServiceProviderInterface;
use League\Flysystem\Filesystem as FlySys;
use League\Flysystem\Adapter\Local as LocalAdapter;

class FileSystem implements ServiceProviderInterface
{

	public function register(Application $app)
	{
		$app->set("FileSystem", function( $baseDir ) {
			return new FlySys(new LocalAdapter($baseDir));
		});
	}

}