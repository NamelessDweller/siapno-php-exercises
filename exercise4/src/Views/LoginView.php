<?php
declare(strict_types=1);

namespace Exercise4\Views;

class LoginView
{
    public function render(array $data = []): void
    {
        extract($data);
        include 'LoginForm.php';
    }
}
