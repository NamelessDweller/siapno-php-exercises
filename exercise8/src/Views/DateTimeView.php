<?php
declare(strict_types=1);

namespace exercise8\Views;

class DateTimeView
{
    public function render(array $dateTimeInfo): void
    {
        extract($dateTimeInfo);
        include 'DateTimeDisplay.php';
    }
}
