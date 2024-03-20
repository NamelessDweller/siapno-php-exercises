<?php
declare(strict_types=1);

namespace exercise3\Views;

class FibonacciView
{
    public function render($data = [])
    {
        extract($data);
        include 'FibonacciForm.php';
    }
}
