<?php
declare(strict_types=1);

namespace exercise10\Views;

class FileOperationView
{
    public function render($data = [])
    {
        extract($data);
        include 'FileOperationDisplay.php';
    }
}