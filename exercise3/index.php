<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise3\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use exercise3\Controller\FibonacciController;
use exercise3\Model\FibonacciModel;
use exercise3\Views\FibonacciView;

$model = new FibonacciModel();
$controller = new FibonacciController($model);
$view = new FibonacciView();

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);

    if ($length === false) {
        $data['error'] = "Please enter a positive integer.";
    } else {
        $data['series'] = $controller->generateSeries($length);
    }
}

$view->render($data);
