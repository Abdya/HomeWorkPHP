<?php
spl_autoload_register(function($className) {
    $classNameProcessed = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $classPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $classNameProcessed . '.php';

    if (file_exists($classPath)) {
        require $classPath;
    }
});