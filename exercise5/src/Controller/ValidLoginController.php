<?php
declare(strict_types=1);

namespace exercise5\Controller;

use exercise5\Model\ValidLoginModel;

class ValidLoginController
{
    private $model;

    public function __construct(ValidLoginModel $model)
    {
        $this->model = $model;
    }

    public function authenticate(string $username, string $password): bool
    {
        return $this->model->validateCredentials($username, $password);
    }
}
