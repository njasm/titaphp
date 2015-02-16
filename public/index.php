<?php

require_once '../bootstrap.php';

$app = TitaPHP\Http\Application::instance();
$app->setConfigs($config);
$app->run();
