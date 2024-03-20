<?php
declare(strict_types=1);

session_start();

spl_autoload_register(function ($class) {
    $prefix = 'exercise10\\';
    $baseDir = __DIR__ . '/src/';
    $relativeClass = str_replace($prefix, '', $class);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use exercise10\Controller\FileOperationController;
use exercise10\Model\FileOperationModel;
use exercise10\Views\FileOperationView;

$model = new FileOperationModel();
$controller = new FileOperationController($model);
$view = new FileOperationView();

if (!isset ($_SESSION['messages'])) {
    $_SESSION['messages'] = ['success' => '', 'error' => ''];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = htmlspecialchars($_POST['filename'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');
    $action = htmlspecialchars($_POST['action'] ?? '');

    // Perform action
    try {
        performAction($action, $controller, $filename, $content);
    } catch (Exception $e) {
        $_SESSION['messages']['error'] = "An error occurred: " . $e->getMessage();
    }

    // Redirect to clear POST data
    header('Location: ' . $_SERVER["PHP_SELF"]);
    exit;
}

// Render view
$view->render($_SESSION['messages']);
$_SESSION['messages'] = ['success' => '', 'error' => ''];

function performAction($action, $controller, $filename, $content)
{
    $safeFilename = 'files/' . (strpos($filename, '.') ? $filename : $filename . '.txt');
    switch ($action) {
        case 'create':
            handleCreate($controller, $safeFilename, $filename);
            break;
        case 'write':
            handleWrite($controller, $safeFilename, $content, $filename);
            break;
        case 'read':
            handleRead($controller, $safeFilename, $filename);
            break;
        case 'delete':
            handleDelete($controller, $safeFilename, $filename);
            break;
        default:
            $_SESSION['messages']['error'] = "Invalid action.";
            break;
    }
}

function handleCreate($controller, $safeFilename, $filename)
{
    if (empty ($filename)) {
        $_SESSION['messages']['error'] = "Please provide a valid file name.";
        return;
    }

    $result = $controller->createFile($safeFilename);
    if ($result) {
        $_SESSION['currentFile'] = $safeFilename;
        $_SESSION['messages']['success'] = "File '$filename' created successfully.";
    } else {
        $_SESSION['messages']['error'] = "Failed to create file '$filename'.";
    }
}

function handleWrite($controller, $safeFilename, $content, $filename)
{
    if (empty ($content)) {
        $_SESSION['messages']['error'] = "Content cannot be empty.";
        return;
    }

    $result = $controller->writeFile($safeFilename, $content);
    $_SESSION['messages']['success'] = $result ? "Content written to '$filename' successfully." : "Failed to write content to '$filename'.";
}

function handleRead($controller, $safeFilename, $filename)
{
    $fileContent = $controller->readFile($safeFilename);
    $_SESSION['messages']['success'] = $fileContent !== null ? "File '$filename' read successfully." : "Failed to read file '$filename'.";
    $_SESSION['fileContent'] = $fileContent ?: '';
}

function handleDelete($controller, $safeFilename, $filename)
{
    $result = $controller->deleteFile($safeFilename);
    if ($result) {
        unset($_SESSION['currentFile'], $_SESSION['fileContent']);
        $_SESSION['messages']['success'] = "File '$filename' deleted successfully.";
    } else {
        $_SESSION['messages']['error'] = "Failed to delete file '$filename'.";
    }
}
