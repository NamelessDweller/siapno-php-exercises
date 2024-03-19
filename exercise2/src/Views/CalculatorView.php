<?php
declare(strict_types=1);

namespace exercise2\Views;

class CalculatorView
{
    public function render($data = [])
    {
        // Extract data variables
        $num1 = $data['num1'] ?? null;
        $num2 = $data['num2'] ?? null;
        $operator = $data['operator'] ?? null;
        $result = $data['result'] ?? null;
        $error = $data['error'] ?? null;
        include 'CalculatorForm.php';
    }
}
