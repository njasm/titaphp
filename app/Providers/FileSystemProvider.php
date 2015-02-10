<?php namespace App\Providers;

use TitaPHP\Foundation\ProviderInterface;
use TitaPHP\Foundation\Application;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local as LocalAdapter;

class FileSystemProvider implements ProviderInterface
{

	public function register(Application $app)
	{
		$app->set("FileSystem", function( $baseDir ) {
			return new Filesystem(new LocalAdapter($baseDir));
		});
	}

}