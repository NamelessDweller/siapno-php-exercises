<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise4\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use exercise4\Controller\LoginController;
use exercise4\Model\LoginModel;
use exercise4\Views\LoginView;

$model = new LoginModel();
$controller = new LoginController($model);
$view = new LoginView();

$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $data['success'] = $controller->authenticate($username, $password) ? "Welcome, $username!" : '';
    $data['error'] = empty($data['success']) ? "Invalid username or password." : '';
}

$view->render($data);
