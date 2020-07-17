<?php

session_start();

// Remova ou comente em produção
ini_set('display_errors', 'On');
error_reporting(E_ALL);

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('DB_FILE', ROOT . 'db' . DIRECTORY_SEPARATOR . 'banco.sqlite');
define('SQL_FILE', ROOT . 'sql' . DIRECTORY_SEPARATOR . 'database.sql');

require ROOT . 'vendor/autoload.php';

if (file_exists(APP . 'config/config.php')) {
    require APP . 'config/config.php';
}

use App\Core\Application;
$app = new Application();
