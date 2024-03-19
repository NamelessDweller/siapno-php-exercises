<?php
declare(strict_types=1);

namespace exercise7\Controller;

use exercise7\Model\ContactFormModel;

class ContactFormController
{
    private $model;

    public function __construct(ContactFormModel $model)
    {
        $this->model = $model;
    }

    public function submitContact($name, $email, $message): bool
    {
        return $this->model->saveContact($name, $email, $message);
    }
}