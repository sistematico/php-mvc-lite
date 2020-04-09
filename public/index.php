<?php

session_start();

// Remova ou comente em produção
ini_set('display_errors', 'On');
error_reporting(E_ALL);

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('DB_FILE', ROOT . 'db' . DIRECTORY_SEPARATOR . 'banco.sqlite');

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
if (file_exists(APP . 'config/config.php')) {
    require APP . 'config/config.php';
}

// load application class
use App\Core\Application;

// start the application
$app = new Application();
