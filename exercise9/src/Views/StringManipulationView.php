<?php
declare(strict_types=1);

namespace exercise9\Views;

class StringManipulationView
{
    public function render($data = [])
    {
        extract($data);
        include 'StringManipulationForm.php';
    }
}