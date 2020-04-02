<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require APP . 'config/config.php';

// load application class
use App\Core\Application;

// start the application
$app = new Application();
