<?php
use Core\Autoloader;
use Core\Router;

require_once __DIR__ . '/src/Core/Autoloader.php';

Autoloader::register();

Router::dispatch();
?>
