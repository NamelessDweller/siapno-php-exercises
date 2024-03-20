<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise2\\';
    $baseDir = __DIR__ . '/src/';
    $class = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use exercise2\Controller\CalculatorController;
use exercise2\Model\CalculatorModel;
use exercise2\Views\CalculatorView;

$model = new CalculatorModel();
$controller = new CalculatorController($model);
$view = new CalculatorView();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $view->render();
    exit;
}

$num1Input = $_POST['num1'] ?? null;
$num2Input = $_POST['num2'] ?? null;
$operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (empty ($num1Input) && $num1Input !== '0' || empty ($num2Input) && $num2Input !== '0') {
    $view->render(['error' => "Both number fields are required!"]);
    exit;
}

$a = filter_var($num1Input, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$b = filter_var($num2Input, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if ($a === false || $b === false) {
    $view->render(['error' => "Invalid input. Please only enter valid numbers."]);
    exit;
}

try {
    $result = $controller->calculate($a, $b, $operator);
    $view->render([
        'num1' => $num1Input,
        'num2' => $num2Input,
        'operator' => $operator,
        'result' => $result,
    ]);
} catch (Exception $e) {
    $view->render(['error' => $e->getMessage()]);
}
