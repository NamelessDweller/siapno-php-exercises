<?php
declare(strict_types=1);

namespace exercise7\Views;

class ContactFormView
{
    public function render($contactData = [], $success = '', $error = '')
    {
        include "ContactFormDisplay.php";
    }
}
