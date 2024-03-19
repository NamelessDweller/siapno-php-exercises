<?php
declare(strict_types=1);

namespace exercise4\Model;

class LoginModel
{
    private $username = 'admin';
    private $password = 'password';

    public function simpleValidation(string $username, string $password): bool
    {
        return $username === $this->username && $password === $this->password;
    }
}