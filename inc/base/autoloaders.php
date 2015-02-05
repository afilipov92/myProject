<?php

/**
 * Подргузка моделей
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
 * Подргузка контроллеров
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
 * Подргузка классов из папки base
 */
spl_autoload_register(function ($class) {
    $classFileName = BASE_PATH . 'base' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($classFileName)) {
        require_once($classFileName);
    }
});