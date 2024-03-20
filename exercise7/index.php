<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $prefix = 'exercise7\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use exercise7\Model\ContactFormModel;
use exercise7\Controller\ContactFormController;
use exercise7\Views\ContactFormView;

$model = new ContactFormModel();
$controller = new ContactFormController($model);
$view = new ContactFormView();

$error = '';
$success = '';
$contactData = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$name || !$email || !$message) {
        $error = "Please fill in all fields.";
    } else if ($controller->submitContact($name, $email, $message)) {
        $success = "Contact information has been saved.";
        $contactData = compact('name', 'email', 'message');
    } else {
        $error = "There was a problem saving your contact information.";
    }
}

$view->render($contactData, $success, $error);
