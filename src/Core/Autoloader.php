<?php

namespace Core;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $prefix = '';
            $baseDir = __DIR__ . '/../';

            $file = $baseDir . str_replace('\\', '/', $class) . '.php';

            if (file_exists($file)) {
                require $file;
            }
        });
    }
}
