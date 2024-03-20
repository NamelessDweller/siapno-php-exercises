<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise6\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use exercise6\Controller\ArraySortController;
use exercise6\Model\ArraySortModel;
use exercise6\Views\ArraySortView;

$model = new ArraySortModel();
$controller = new ArraySortController($model);
$view = new ArraySortView();

$originalArrayInput = $_POST['array'] ?? '';
$sortedArrayString = '';
$order = $_POST['order'] ?? 'asc';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $originalArrayInput !== '') {
    $array = array_filter(array_map('trim', explode(',', $originalArrayInput)), 'is_numeric');

    if ($array) {
        $sortedArray = $controller->sortArray($array, $order);
        $sortedArrayString = implode(', ', $sortedArray);
    }
}

$view->render(!empty ($_POST), $originalArrayInput, $sortedArrayString, $order);
