<?php
declare(strict_types=1);

namespace exercise4\Controller;

use exercise4\Model\LoginModel;

class LoginController
{
    private $model;

    public function __construct(LoginModel $model)
    {
        $this->model = $model;
    }

    public function authenticate(string $username, string $password): bool
    {
        return $this->model->simpleValidation($username, $password);
    }
}