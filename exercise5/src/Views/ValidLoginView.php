<?php
declare(strict_types=1);

namespace exercise5\Views;

class ValidLoginView
{
    public function render($data = [])
    {
        extract($data);
        include "ValidLoginForm.php";
    }
}
