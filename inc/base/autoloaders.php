<?php

/**
 * loading models
 */
spl_autoload_register(function ($class) {
    $modelFlag = strpos($class, 'Model');
    if ($modelFlag === false) {
        return;
    }
    $modelFileName = BASE_PATH . 'models' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($modelFileName)) {
        require_once($modelFileName);
    }
});

/**
 * loadings controllers
 */
spl_autoload_register(function ($class) {
    $controllerFlag = strpos($class, 'Controller');
    if ($controllerFlag === false) {
        return;
    }
    $controllerFileName = BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($controllerFileName)) {
        require_once($controllerFileName);
    }
});

/**
 * loading classes from base
 */
spl_autoload_register(function ($class) {
    $classFileName = BASE_PATH . 'base' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($classFileName)) {
        require_once($classFileName);
    }
});

/**
 * loadings classes helpers
 */
spl_autoload_register(function ($class) {
    $classFileName = BASE_PATH . 'helpers' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($classFileName)) {
        require_once($classFileName);
        return true;
    }
});