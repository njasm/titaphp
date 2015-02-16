<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', realpath(__DIR__).DS);
define('APP_PATH', realpath(__DIR__.'/app/').DS);
define('CONFIG_PATH', realpath(__DIR__.'/config/').DS);
define('STORAGE_PATH', realpath(__DIR__.'/storage/').DS);
define('PUBLIC_PATH', realpath(__DIR__.'/public/').DS);
define('RESOURCES_PATH', realpath(__DIR__.'/resources/').DS);
define('VENDOR_PATH', realpath(__DIR__.'/vendor/').DS);

require VENDOR_PATH.'autoload.php';

// load config files
$config = array();
foreach (glob(CONFIG_PATH.'/*.php') as $configFile) {
    require $configFile;
}
