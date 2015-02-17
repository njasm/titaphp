<?php namespace App\Console;

require_once __DIR__ . '/../../bootstrap.php';

$app = \TitaPHP\Console\Application::instance();
$app->setConfigs($config);
$app->run();
