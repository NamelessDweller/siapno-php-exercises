<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise8\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use exercise8\Controller\DateTimeController;
use exercise8\Model\DateTimeModel;
use exercise8\Views\DateTimeView;

$model = new DateTimeModel();
$controller = new DateTimeController($model);
$view = new DateTimeView();

$currentDateTime = $controller->getDateTime();
$view->render($currentDateTime);