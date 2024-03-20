<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise9\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use exercise9\Controller\StringManipulationController;
use exercise9\Model\StringManipulationModel;
use exercise9\Views\StringManipulationView;

$model = new StringManipulationModel();
$controller = new StringManipulationController($model);
$view = new StringManipulationView();

$context = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $str1 = htmlspecialchars($_POST['string1'] ?? '');
    $str2 = htmlspecialchars($_POST['string2'] ?? '');
    $start = isset ($_POST['start']) ? (int) htmlspecialchars($_POST['start']) : null;
    $length = isset ($_POST['length']) && $_POST['length'] !== '' ? (int) htmlspecialchars($_POST['length']) : null;
    $replaceWith = htmlspecialchars($_POST['replaceWith'] ?? '');
    $operation = htmlspecialchars($_POST['operation'] ?? '');

    if (empty ($str1) || (empty ($str2) && $operation !== 'substring')) {
        $context['error'] = "Please fill in all required fields.";
    } else {
        switch ($operation) {
            case 'concatenate':
                $result = $controller->concatenate($str1, $str2);
                break;
            case 'substring':
                $concatStr = $controller->concatenate($str1, $str2);
                $result = $controller->getSubstring($concatStr, $start, $length);
                break;
            case 'replace':
                $concatStr = $controller->concatenate($str1, $str2);
                $result = $controller->replaceSubstring($concatStr, $start, $replaceWith, $length);
                break;
            default:
                $result = "Invalid operation selected.";
                break;
        }

        $context['result'] = $result;
    }
}

$view->render($context);
