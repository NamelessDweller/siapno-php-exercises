<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise5\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use exercise5\Controller\ValidLoginController;
use exercise5\Model\ValidLoginModel;
use exercise5\Views\ValidLoginView;

$model = new ValidLoginModel();
$controller = new ValidLoginController($model);
$view = new ValidLoginView();

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = trim($_POST['password'] ?? '');
    $error = empty ($username) || empty ($password) ? "Both username and password are required." : '';

    $success = !$error && $controller->authenticate($username, $password) ? "Welcome, $username!" : '';
    $error = !$error && !$success ? "Invalid username or password." : $error;

    $view->render(['error' => $error, 'success' => $success]);
} else {
    $view->render();
}
