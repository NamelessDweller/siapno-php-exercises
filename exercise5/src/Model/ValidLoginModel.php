<?php
declare(strict_types=1);

namespace exercise5\Model;

class ValidLoginModel
{
    private $users = [
        'trueadmin' => 'truepassword',
        'subadmin' => 'subpassword',
        'maintainer' => 'maintainpassword'
    ];

    public function validateCredentials(string $username, string $password): bool
    {
        if (array_key_exists($username, $this->users) && $this->users[$username] === $password) {
            return true;
        }

        return false;
    }
}
