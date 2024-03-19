<?php
declare(strict_types=1);

namespace exercise7\Model;

class ContactFormModel
{
    public function saveContact($name, $email, $message): bool
    {
        return true;
    }
}